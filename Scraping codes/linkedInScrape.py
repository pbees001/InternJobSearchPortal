from bs4 import BeautifulSoup as bs
import requests
import time
from random import randint
import csv

def writeToCSV():
    with open('linkedinLinks1.csv', 'r') as src, \
        open('postings/linkedIn2.csv','w',newline='') as csv_file:
        csv_reader = csv.reader(src)
        fieldnames = ['id', 'jobUrl', 'jobId', 'companyName', 'companyUrl', 'jobTitle', 'logoUrl', 'location', 'insights', 'postDate', 'isEasyApply', 'isPromoted', 'applicantCount', 'url', 'query', 'category', 'timestamp', 'isRemote', 'applyUrl', 'jobDescription', 'jobFunctions', 'jobIndustries', 'jobType', 'appliesClosed']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        writer.writeheader()
        cnt = 184
        for row in csv_reader:
            if cnt != 0:
                #scrape
                try:
                    heads = {
                        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                        "Accept-Encoding": "gzip, deflate",
                        "Accept-Language": "en-US,en;q=0.9",
                        "Cache-Control": "max-age=0",
                        "Upgrade-Insecure-Requests": "1",
                        "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36",
                    }
                    session = requests.Session()
                    response = session.get(row[0], headers=heads)
                    print("Id: "+ str(cnt) +", server response: "+str(response.status_code))
                    soup = bs(response.content, 'lxml')
                    closed = False
                    job_closed = soup.find('figure', class_="closed-job closed-job__flavor topcard__flavor-row")
                    if job_closed:
                        closed = True
                    link = soup.find('div', class_="top-card-layout__cta-container")
                    applyLink = ""
                    if closed == False:
                        applyLink = link.a['href']
                    jobs = soup.find('div', class_="show-more-less-html__markup")
                    employementType = soup.find_all('span', class_="description__job-criteria-text")
                    try:
                        writer.writerow({'id': cnt, 'jobUrl': row[0], 'jobId': row[1], 'companyName': row[2], 'companyUrl': row[3], 'jobTitle': row[4], 'logoUrl': row[5], 'location': row[6], 'insights': row[7], 'postDate': row[8], 'isEasyApply': row[9], 'isPromoted': row[10], 'applicantCount': row[11], 'url': row[12], 'query': row[13], 'category': row[14], 'timestamp': row[15], 'isRemote': row[16], 'applyUrl': applyLink, 'jobDescription': jobs.text.strip().split('\n'), 'jobFunctions': employementType[2].text.strip().split('\n'), 'jobIndustries': employementType[3].text.strip().split('\n'), 'jobType': employementType[1].text.strip().split('\n'), 'appliesClosed': closed})
                    except:
                        print("Object Error: " + str(row[1]))
                        cnt-=1
                    time_wait = randint(20, 40)
                    time.sleep(time_wait)
                except:
                    print("Any Error: " + str(cnt))
                    cnt-=1
            cnt += 1

#        writer.writerow({'emp_name': 'John Smith', 'dept': 'Accounting', 'birth_month': 'November'})
#        writer.writerow({'emp_name': 'Erica Meyers', 'dept': 'IT', 'birth_month': 'March'})

def findjobs():
    url = "https://www.linkedin.com/jobs/view/2730519560/"
    heads = {
        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "Accept-Encoding": "gzip, deflate",
        "Accept-Language": "en-US,en;q=0.9",
        "Cache-Control": "max-age=0",
        "Upgrade-Insecure-Requests": "1",
        "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36",
    }
    session = requests.Session()
    response = session.get(url, headers=heads)
    print(response)
    soup = bs(response.content, 'lxml')
    title = soup.find('h3', class_="sub-nav-cta__header")
    print("Title: "+title.text)
    company = soup.find('span', class_="topcard__flavor")
    print("Company Name: "+company.text)
    link = soup.find('div', class_="top-card-layout__cta-container")
    print("Apply link: "+link.a['href'])
    llink = soup.find('div', class_="top-card-layout__card")
    print("Company LinkedIn profile: "+llink.a['href'].rsplit("?",1)[0])
    location = soup.find('span', class_="sub-nav-cta__meta-text")
    print("Location: "+location.text)
    jobs = soup.find('div', class_="show-more-less-html__markup")
    print("Job Description: "+jobs.text)
    employementType = soup.find_all('span', class_="description__job-criteria-text")
    print("jobType: "+employementType[1].text)
    print("jobFunctions: "+employementType[2].text)
    print("jobIndustries: "+employementType[3].text)
    applicants = soup.find('span', class_="num-applicants__caption topcard__flavor--metadata topcard__flavor--bullet")
    print("Applicants Count: "+applicants.text)

def findd():
    url = "https://www.linkedin.com/jobs/view/2696901240/"
    heads = {
        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "Accept-Encoding": "gzip, deflate",
        "Accept-Language": "en-US,en;q=0.9",
        "Cache-Control": "max-age=0",
        "Upgrade-Insecure-Requests": "1",
        "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36",
    }
    session = requests.Session()
    response = session.get(url, headers=heads)
    print(response)
    url2 = "https://www.linkedin.com/jobs/view/2734408898/"
    session = requests.Session()
    response = session.get(url2, headers=heads)
    print(response)
    soup = bs(response.content, 'html.parser')
    jobs = soup.find('div', class_="show-more-less-html__markup")
    print(jobs.text)

def main():
    writeToCSV()
#    findjobs()
#    findd()

if __name__ == '__main__':
    main()
