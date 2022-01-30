#==== Libraries ====
#Sys.setlocale("LC_ALL","Arabic") # to fix arabic lang
library("RMariaDB")
library("DBI")
library(dplyr)
library(tidyr) 
library(jsonlite)
library(lubridate)
library(writexl)


#====  create connection to database and select data =======
con <- DBI::dbConnect(RMariaDB::MariaDB(),
                      host="localhost",
                      dbname ="contractors_pm3",  # rename "contractors_pm6" to be "contractors_pm3"
                      username="root", password="")

# === path to json file 
path <- "RCODE/ind_34.json"

# === read chart json file 
chart <- read_json("ind_34_chart.json")


#=== Start constructing full dataset =====
#p_data table of all the projects data
data = DBI::dbReadTable(con, "p_data") 

# comine data and change_or and solve dublication of project ID
# data for extra time and value== change order
rdata = DBI::dbReadTable(con, "change_or") # 
jdata <- left_join(data, rdata, by = c("ID" = "PROID"))

jdata <- jdata %>% 
  select(ID, CHANGE_VALUE, CHANGE_TIME,ID.y) %>%
  group_by(ID) %>%
  summarise(extra_value = sum(CHANGE_VALUE, na.rm = T),
            extra_time = sum(CHANGE_TIME, na.rm = T),
            extra_index = sum(!is.na(unique(ID.y) ) )  ) 



# combine after solve ID dublication problem
data <- left_join(data, jdata, by = c("ID" = "ID"))

# comine data and warnings
rdata = DBI::dbReadTable(con, "warnings") # 
rdata <- rdata %>% select(PROID, WAR_TYPE) %>%
  group_by(PROID) %>%
  summarise(P_1warn_index = sum(WAR_TYPE==1, na.rm = T),
            P_2warn_index = sum(WAR_TYPE==2, na.rm = T),
            P_3warn_index = sum(WAR_TYPE==3, na.rm = T),
            P_warn_index = P_1warn_index +P_2warn_index +P_3warn_index )

data <- left_join(data, rdata, by = c("ID" = "PROID"))


#==== Create fields =====
# change region code from 6 to 1 (الاحساء)
data$P_REGION[data$P_AREA==47] = 1

# region names: rdata$reg_name 
rdata = DBI::dbReadTable(con, "options_region") # Regions names
data$reg_name = rdata$reg_name[data$P_REGION] 

# area names: rdata$area_name 
rdata = DBI::dbReadTable(con, "options_area") # area names
data$area_name = rdata$area_name[data$P_AREA] 

# contractors names: rdata$cont_name  (note: RowNumber - 5)
rdata = DBI::dbReadTable(con, "contractors_cont") # contractors names
data$cont_name = rdata$cont_name[(data$P_CONTID -5)] 

# warning types: rdata$wtype_description 
#rdata = DBI::dbReadTable(con, "option_warnings_type") # warning types
#data$warn_type = rdata$wtype_description[data$WAR_TYPE] 

# project_status: rdata$psta_description 
rdata = DBI::dbReadTable(con, "options_project_status") # project_status
data$project_status = rdata$psta_description[data$P_CASE] 

# project_gender: rdata$mf_title 
rdata = DBI::dbReadTable(con, "options_mf") # project_gender
data$project_gender = rdata$mf_title[data$P_MF] 


DBI::dbDisconnect(con)

#===== Fix dates issues ====
data$P_PRIMAD = ifelse( (data$P_PRIMAD == ""), NA_character_, data$P_PRIMAD )
data$P_FIND = ifelse( (data$P_FIND == ""), NA_character_, data$P_FIND )

data$P_STARTD = as.Date(data$P_STARTD,tryFormats = c("%Y%m%d"))
data$P_ENDD = as.Date(data$P_ENDD,tryFormats = c("%Y%m%d"))
data$P_PRIMAD = as.Date(data$P_PRIMAD,tryFormats = c("%Y%m%d"))
data$P_FIND = as.Date(data$P_FIND,tryFormats = c("%Y%m%d"))
data$CH_CANCEL_DATE = as.Date(data$CH_CANCEL_DATE,tryFormats = c("%Y%m%d"))

data$P_STARTD[year(data$P_STARTD)==-1]=NA
data$P_ENDD[year(data$P_ENDD)==-1]=NA
data$P_PRIMAD[year(data$P_PRIMAD)==-1]=NA
data$P_FIND[year(data$P_FIND)==-1]=NA
data$CH_CANCEL_DATE[year(data$CH_CANCEL_DATE)==-1]=NA
#table(data$CH_CANCEL_DATE)
#sum(!is.na(data$CH_CANCEL_DATE ))
#sum(!is.na(data$CH_DATE ))
#head(data$P_FIND)

#====== create indicator variables ====
# for loaction delivered but not primary delivered
data$P_loc_index[data$P_CASE  %in% c(4,5,6) ] = 1
#data %>% select(P_CASE,P_loc_index) %>% filter(P_CASE %in% c(4,5,6))
# for primary delivered
data$P_prim_index[data$P_CASE==3] = 1
# for finally delivered
data$P_final_index[data$P_CASE==7] = 1
# for mas'houba
data$P_mashouba_index[data$CH_CASE==1] = 1
# for faskh contract
data$P_faskh_index[data$CH_CASE==2] = 1


# remove wekalah region
data_all = data %>% filter(P_REGION < 17) 
#readr::write_rds(data, "full.data2.Rda")




#================ indicators code ======================
##===== required inputs
#=== commandArgs picks up the variables you pass from the command line
#input1 <- commandArgs(trailingOnly = TRUE)
##print(args)
## Rscript ind1-1-full.R "1430-04-08" "1430-12-27"
#input1 <- c("1426-01-11", "1449-10-11") # year


#========================== ind1-1 =================================
# requires today date as hijri
data <- data_all %>% 
  group_by(label = reg_name) %>% filter(is.na(P_PRIMAD) ) %>%
  summarise(number_running_projects = sum( (P_ENDD+extra_time) > "1442-05-15", na.rm = T) ) 

names(data) <- c("label", "value")
data[] <- lapply(data, as.character )

categories <- list(list(category = data[1])) # label
dataset <- list( list(seriesname='region', data = data[2])   ) # data
ind <- list( chart = chart, categories = categories, dataset = dataset)
#== save data  in json file
jsonlite::write_json(ind, path, pretty =T, auto_unbox=T) # write Json to the provided path 

