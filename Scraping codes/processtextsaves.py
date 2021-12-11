import pandas as pd
import csv
from bs4 import BeautifulSoup as bs
import unicodedata

def dopreprocess():
    with open('samplesh3.csv','r') as src, \
            open('simplyhireddata.csv', 'w', newline='', encoding="UTF-8") as csv_file:
        csv_reader = csv.reader(src)
        fieldnames = ['id', 'jobUrl', 'companyName', 'companyUrl', 'jobTitle', 'logoUrl', 'location', 'postDate', 'applicantsCount', 'timestamp', 'isRemote', 'applyUrl', 'jobDescription', 'jobFunctions', 'jobIndustries', 'jobType', 'appliesClosed']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        writer.writeheader()
        cnt = 1
        for row in csv_reader:
            soup = bs(str(row),'lxml')
            title = soup.find('h3', class_ = "jobposting-title")
            company = soup.find('span', class_ = "jobposting-company")
            location = soup.find('span', class_ = "jobposting-location")
            loc = location.text
#            loctext = unicodedata.normalize("NFKD",loc)
            description = soup.find('p', class_ = "jobposting-snippet")
            try:
                salary = soup.find('div', class_ = "jobposting-salary")
                sal = salary.text
            except:
                sal=""
            timestamp = soup.find('span', class_ = "SerpJob-timestamp")
            writer.writerow(
                {'id': cnt, 'jobUrl': "", 'companyName': company.text, 'companyUrl': "", 'jobTitle': title.text,
                 'logoUrl': "", 'location': loc, 'postDate': "", 'applicantsCount': "",
                 'timestamp': timestamp.time['datetime'], 'isRemote': "", 'applyUrl': "", 'jobDescription': description.text+sal,
                 'jobFunctions': "", 'jobIndustries': "", 'jobType': "",
                 'appliesClosed': ""})

            cnt+=1
            print(title.text)
            print(company.text)
            print(loc)
            print(description.text+sal)
            print(timestamp.time['datetime'])

def dopreprocesszip():
    with open('ziprecruiterdata.csv','r') as src, \
            open('zipdata.csv', 'w', newline='', encoding="UTF-8") as csv_file:
        csv_reader = csv.reader(src)
        fieldnames = ['id', 'jobUrl', 'companyName', 'companyUrl', 'jobTitle', 'logoUrl', 'location', 'postDate', 'applicantsCount', 'timestamp', 'isRemote', 'applyUrl', 'jobDescription', 'jobFunctions', 'jobIndustries', 'jobType', 'appliesClosed']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        writer.writeheader()
        cnt = 1
        for row in csv_reader:
            res = str(row)[2:-2].split('|')
            print(cnt)
#            for val in res:
#                print(val)
            jobtitle = res[0]
            companyName = res[1]
            location = res[2]
            jobtype = ""
            applylink=""
            salary=""
            benefits=""
            descIndex=0
            for count,val in enumerate(res):
                if val.startswith("Type"):
                    jobtype = val.split(' ')[1]
                if val.startswith("link"):
                    applylink = val.split(' ')[1]
                    descIndex = count - 1
                if val.startswith("Pay"):
                    salary = val
                if val.startswith("Benefits"):
                    benefits = val

            jobDescription = res[descIndex]+". "+salary+". "+benefits+"."
            writer.writerow(
                {'id': cnt, 'jobUrl': "", 'companyName': companyName, 'companyUrl': "", 'jobTitle': jobtitle,
                 'logoUrl': "", 'location': location, 'postDate': "", 'applicantsCount': "",
                 'timestamp': "", 'isRemote': "", 'applyUrl': applylink, 'jobDescription': jobDescription,
                 'jobFunctions': "", 'jobIndustries': "", 'jobType': jobtype,
                 'appliesClosed': ""})

            # print(jobtitle)
            # print(companyName)
            # print(location)
            # print(jobtype)
            # print(applylink)
            # print(jobDescription)
            cnt+=1

def texttocsv():
    txt_file = r"postings/saved/simplyhired2.txt"
    csv_file = r"samplesh3.csv"
    in_txt = csv.reader(open(txt_file, "r"), delimiter='\n')
    out_csv = csv.writer(open(csv_file, 'w'))

    out_csv.writerows(in_txt)

def texttocsvzip():
    txt_file = r"postings/saved/zipselenium8k.txt"
    csv_file = r"ziprecruiterdata.csv"
    in_txt = csv.reader(open(txt_file, "r"), delimiter='~')
    out_csv = csv.writer(open(csv_file, 'w'))

    out_csv.writerows(in_txt)

def textpreprocess():
    with open('postings/saved/zipdata1k.txt','r') as src,\
        open('postings/saved/zipdata1kk.txt','w') as dest:
        content = src.read()
        content.replace('\n','|')
        dest.write(content)

def converttoascii():
    ss = "DoorDash is building the world's most reliable on-demand, logistics engine for delivery! We're looking for experienced engineers to join our fast-growing engineering team to help us develop a 24x7, global infrastructure system that powers DoorDash's three-sided marketplace of consumers, merchants, and dashers.\n\nAt DoorDash, our product engineers implement and operate technological solutions to improve the experiences of our merchants, dashers, and consumers. From creating beautiful, user-friendly flows to crafting scalable backend architectures, we strive to deliver reliant, performant technology that delights our customers.\n\nWhat You'll Do\nIntern programming - AMAs, game nights, movie nights, intern etcPresent your summer learnings during Demo Day at the end of the internshipDevelop, maintain and ship technical elements with the support of your mentor, manager, and team membersAct on feedback, coaching, and mentorship from your mentor, and team membersActively learn about the elements to which you contributeMake a direct impact on our business by collaborating with your team to solve problems for our customers\nHere Are Some Examples Of Past Intern Projects\nBuilding Reliable Workflows: Cadence as a Fallback for Event-Driven ProcessingScaling DoorDash's Geospatial Innovation with a Location-Based Delivery SimulatorMy Engineering Internship Experience at DoorDash\nQualifications\nB.S., M.S., or PhD. in Computer Science graduating in December 2022 or Spring 2023Must be available for a May or June 2022 start date (SUMMER ONLY)Experience working with databases (e.g. SQL)Solid understanding of algorithms and data structuresExperience working with at least one object-oriented programming language (e.g. Python, Java, Kotlin, etc)Experience writing clean code, working with version control, and unit testing\nNice to haves\nAt least 1 previous internship or equivalent practical experienceAble to analyze and improve efficiency, scalability, and stability of various systemsExcited to develop, release and run large-scale web applicationsExperience with solutions for systems monitoring, live deployments and continuous integrationExperience with real-time technology problemsExperience working with service oriented architecture, writing APIs, and designing systems\nWhy You'll Love Working at DoorDash\nWe are leaders - Leadership is not limited to our management team. It's something everyone at DoorDash embraces and embodies.We are doers - We believe the only way to predict the future is to build it. Creating solutions that will lead our company and our industry is what we do -- on every project, every day.We are learners - We're not afraid to dig in and uncover the truth, even if it's scary or inconvenient. Everyone here is continually learning on the job, no matter if we've been in a role for one year or one minute.We are customer obsessed - Our mission is to grow and empower local economies. We are committed to our customers, merchants, and dashers and believe in connecting people with possibility.We are all DoorDash - The magic of DoorDash is our people, together making our inspiring goals attainable and driving us to greater heights.We offer great compensation packages and comprehensive health benefits.\nAbout DoorDash\n\nAt DoorDash, our mission to empower local economies shapes how our team members move quickly and always learn and reiterate to support merchants, Dashers and the communities we serve. We are a technology and logistics company that started with door-to-door delivery, and we are looking for team members who can help us go from a company that is known for delivering food to a company that people turn to for any and all goods. Read more on the DoorDash website, the DoorDash blog, the DoorDash Engineering blog, and the DoorDash Careers page.\n\nDoorDash is growing rapidly and changing constantly, which gives our team members the opportunity to share their unique perspectives, solve new challenges, and own their careers. Our leaders seek the truth and welcome big, hairy, audacious questions. We are grounded in our company values, and we make intentional decisions that are both logical and display empathy for our range of users\u201a\u00c4\u00f6\u221a\u00d1\u221a\u00c6from Dashers to Merchants to Customers.\n\nPursuant to the San Francisco Fair Chance Ordinance, Los Angeles Fair Chance Initiative for Hiring Ordinance, and any other state or local hiring regulations, we will consider for employment any qualified applicant, including those with arrest and conviction records, in a manner consistent with the applicable regulation.We're committed to supporting employees' happiness, healthiness, and overall well-being by providing comprehensive benefits and perks including premium healthcare, wellness expense reimbursement, paid parental leave and more.\n\nOur Commitment to Diversity and Inclusion\n\nWe're committed to growing and empowering a more inclusive community within our company, industry, and cities. That's why we hire and cultivate diverse teams of people from all backgrounds, experiences, and perspectives. We believe that true innovation happens when everyone has room at the table and the tools, resources, and opportunity to excel.\n\nStatement of Non-Discrimination: In keeping with our beliefs and goals, no employee or applicant will face discrimination or harassment based on: race, color, ancestry, national origin, religion, age, gender, marital/domestic partner status, sexual orientation, gender identity or expression, disability status, or veteran status. Above and beyond discrimination and harassment based on \"protected categories,\" we also strive to prevent other subtler forms of inappropriate behavior (i.e., stereotyping) from ever gaining a foothold in our office. Whether blatant or hidden, barriers to success have no place at DoorDash. We value a diverse workforce \u201a\u00c4\u00f6\u221a\u00d1\u221a\u00a8 people who identify as women, non-binary or gender non-conforming, LGBTQIA+, American Indian or Native Alaskan, Black or African American, Hispanic or Latinx, Native Hawaiian or Other Pacific Islander, differently-abled, caretakers and parents, and veterans are strongly encouraged to apply. Thank you to the Level Playing Field Institute for this statement of non-discrimination.\n\nIf you need any accommodations, please inform your recruiting contact upon initial connection."
    ss.encode('ascii','ignore')
    print(ss)

if __name__ == '__main__':
#    dopreprocesszip()
#    texttocsvzip()
#    textpreprocess()
    converttoascii()
