from bs4 import BeautifulSoup as bs
import requests
import time
#from fake_useragent import UserAgent
from random import randint

def findjobs():
    url = "https://www.ziprecruiter.com/Jobs/Intern"
    id=1
    #create postings folder
    with open(f'postings/zip.txt','w') as f:
        for i in range(1,4):
            if i>1:
                query_parameter = "/"+str(i)+"?"
                url = url + query_parameter
    #        response = requests.get("https://www.ziprecruiter.com/candidate/search?search=internship&location=Norfolk%2C+VA")
    #        hs = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:63.0) Gecko/20100101 Firefox/63.0'}
#            ua = UserAgent()
#            hs = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'accept': '"text/html,application...', 'referer': 'https://...'}
            heads={
                "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                "Accept-Encoding": "gzip, deflate",
                "Accept-Language": "en-US,en;q=0.9",
                "Cache-Control": "max-age=0",
                "Upgrade-Insecure-Requests": "1",
                "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36",
            }
            session = requests.Session()
            response = requests.get(url, headers=heads )
            print(response)
            soup = bs(response.content,'lxml')
            jobs = soup.find_all('article', class_ = "job_item")
            for job in jobs:
                f.write(f"{id}) Job posting details: {job} \n")
                id+=1
            time_wait = randint(4,10)
            print(f'Waiting {time_wait} minutes...')
            time.sleep(time_wait * 60)

def findd():
    url = "https://www.ziprecruiter.com/Jobs/Intern"
    id=1
    #create postings folder
    with open(f'postings/zip.txt','w') as f:
        for i in range(1,2):
            if i>1:
                query_parameter = "/"+str(i)+"?"
                url = url + query_parameter
    #        response = requests.get("https://www.ziprecruiter.com/candidate/search?search=internship&location=Norfolk%2C+VA")
    #        hs = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:63.0) Gecko/20100101 Firefox/63.0'}
#            ua = UserAgent()
#            hs = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', 'accept': '"text/html,application...', 'referer': 'https://...'}
            heads={
                "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                "Accept-Encoding": "gzip, deflate",
                "Accept-Language": "en-US,en;q=0.9",
                "Cache-Control": "max-age=0",
                "Upgrade-Insecure-Requests": "1",
                "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36",
            }
            session = requests.Session()
            response = session.get(url, headers=heads )
            print(response)

def main():
#    findjobs()
    findd()

if __name__ == '__main__':
    main()
