from bs4 import BeautifulSoup as bs
import requests
import time
from random import randint

def findjobs():
    url = "https://www.ziprecruiter.com/Jobs/Intern"
    id=1
    with open(f'postings/zip.txt','w') as f:
        for i in range(1,4):
            if i>1:
                query_parameter = "/"+str(i)+"?"
                url = url + query_parameter
            hs = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36'}
            response = requests.get(url, headers=hs )
            print(response)
            soup = bs(response.content,'lxml')
    #        jobs = soup.find_all('article', class_ = "job_result")
            jobs = soup.find_all('article', class_ = "job_item")
            for job in jobs:
                f.write(f"{id}) Job posting details: {job} \n")
                id+=1
            time_wait = randint(4,10)
            print(f'Waiting {time_wait} minutes...')
            time.sleep(time_wait * 60)

def findjobs2():
    base_url = "https://www.ziprecruiter.com/n/Full-Time-Jobs-Near-Me"
    for i in range(1,3):
        if i>1:
            query_parameter = "/"+str(i)+"?"
        else:
            query_parameter = ""
        url = base_url + query_parameter
#        response = requests.get("https://www.ziprecruiter.com/candidate/search?search=internship&location=Norfolk%2C+VA")
        response = requests.get(url)
        print(response)
        soup = bs(response.content,'lxml')
#        jobs = soup.find_all('article', class_ = "job_result")
        jobs = soup.find_all('article', class_ = "job_item")
        with open(f'postings/{str(i)}.txt','w') as f:
            for index, job in enumerate(jobs):
                f.write(f"{index}) Job posting details: {job} \n")
                print(f'File saved: {str(i)}')
        time_wait = 1
        print(f'Waiting {time_wait} minutes...')
        time.sleep(time_wait * 60)

def testonsamplearticles():
    for i in range(2,6):
        with open('zipsamples.html','r') as ff:
            response = ff.read()
            soup = bs(response,'lxml')
            jobs = soup.find_all('article', class_ = "job_result")
            with open(f'postings/{str(i)}.txt','w') as f:
                for index, job in enumerate(jobs):
                    f.write(f"{index}) Job posting details: {job} \n")
                    print(f'File saved: {str(i)}')
            time_wait = 2
            print(f'Waiting {time_wait} minutes...')
            time.sleep(time_wait * 60)

def main():
    findjobs()
#    testonsamplearticles()

if __name__ == '__main__':
    main()
