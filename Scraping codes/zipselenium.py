from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
from random import randint

def findjobsfile():
    id=1
    viewedPages = set()
    totalPagesCnt = 200
    viewedPagesCnt = 0
    with open(f'postings/zipselenium.txt','w') as f:
        while viewedPagesCnt < totalPagesCnt:
            r = randint(2, 550)
            if r not in viewedPages:
                viewedPagesCnt += 1
                viewedPages.add(r)
            else:
                continue
            driver = webdriver.Chrome('/Users/aruntella/Downloads/chromedriver')
            url = "https://www.ziprecruiter.com/Jobs/Internship"
            query_parameter = "/"+str(r)+"?"
            url = url + query_parameter
            try:
                driver.get(url)
            except:
                print("Unable to access page")
                time.sleep(15)
                driver.quit()
                continue
            time.sleep(3)
            try:
                main = WebDriverWait(driver, 3).until(
                    EC.presence_of_element_located((By.CLASS_NAME, "zrs_close_btn"))
                )
                main.click()
#                driver.find_element_by_class_name('zrs_close_btn').click()
            except:
                print("No email pop-over")
#                driver.quit()
#                continue
            time.sleep(4)
            articles = driver.find_elements_by_class_name("job_item")
            for article in articles:
                link = article.find_element_by_tag_name("a")
#                print("link: "+link.get_attribute('href'))
                f.write(f"{id}) Job posting details: {article.text} \n")
                f.write(f"link: {link.get_attribute('href')} \n")
                id+=1
            if viewedPagesCnt==100:
                print("100 docs")
            elif viewedPagesCnt==200:
                print("200 docs")
            elif viewedPagesCnt==500:
                print("500 docs")
            elif viewedPagesCnt==1000:
                print("1000 docs")
            driver.quit()
            time_wait = randint(1,3)
            print(f'Page accessed : {r}')
            print(f'Waiting {time_wait} minutes...')
            time.sleep(time_wait * 60)

def main():
    findjobsfile()

if __name__ == '__main__':
    main()
