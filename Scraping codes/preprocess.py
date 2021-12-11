import csv
import glob

def main():
    #adding manual scraped, phantom scraped linkedin job postings
    with open('manual.csv', 'r') as src1, \
            open('CollectedLinkedInData.csv', 'r') as src2, \
            open('CollectedLinkedInDataProcessed.csv', 'w', newline='') as csv_file:
#        csv_reader1 = csv.reader(src1)
        csv_reader2 = csv.reader(src2)
        fieldnames = ['id', 'jobUrl', 'companyName', 'companyUrl', 'jobTitle', 'logoUrl', 'location', 'postDate', 'applicantsCount', 'timestamp', 'isRemote', 'applyUrl', 'jobDescription', 'jobFunctions', 'jobIndustries', 'jobType', 'appliesClosed']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        writer.writeheader()
        cnt = 1
        # for row in csv_reader1:
        #     if cnt != 0:
        #         if row[1] == "":
        #             continue
        #         writer.writerow({'id': cnt, 'jobUrl': row[1], 'companyName': row[3], 'companyUrl': row[4], 'jobTitle': row[5], 'logoUrl': row[6], 'location': row[7], 'postDate': row[9], 'applicantsCount': row[12], 'timestamp': row[16], 'isRemote': row[17], 'applyUrl': row[18], 'jobDescription': row[19][2:-2], 'jobFunctions': row[20][2:-2], 'jobIndustries': row[21][2:-2], 'jobType': row[22][2:-2], 'appliesClosed': row[23]})
        #     cnt += 1
        ind = 0
        for row in csv_reader2:
            if ind >= 1:
                # if row[20] == "":
                #     continue
                postDate = row[8][5:7]+'/'+row[8][8:10]+'/'+row[8][2:4]
                writer.writerow({'id': ind, 'jobUrl': row[20], 'companyName': row[13], 'companyUrl': row[14], 'jobTitle': row[3], 'logoUrl': row[21], 'location': row[4], 'postDate': postDate, 'applicantsCount': row[5], 'timestamp': row[1], 'isRemote': row[12], 'applyUrl': row[10], 'jobDescription': row[11], 'jobFunctions': row[16], 'jobIndustries': row[17], 'jobType': row[19], 'appliesClosed': row[9]})
#                cnt += 1
            ind += 1

def addCollection():
    with open('canadalinks.csv', 'w', newline='') as csv_file:
        fieldnames = ['jobUrl', 'jobId', 'companyName', 'companyUrl', 'jobTitle', 'logoUrl', 'location', 'insights',
                      'postDate', 'isEasyApply', 'isPromoted', 'applicantCount', 'url', 'query', 'category',
                      'timestamp']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        writer.writeheader()
        for file in glob.iglob('Canada/*.csv'):
            with open(file, 'r') as src1:
                print(file)
                csv_reader1 = csv.reader(src1)
                cnt = 0
                for row in csv_reader1:
                    if cnt != 0:
                        writer.writerow({'jobUrl': row[0], 'jobId': row[1], 'companyName': row[2], 'companyUrl': row[3], 'jobTitle': row[4], 'logoUrl': row[5], 'location': row[6], 'insights': row[7], 'postDate': row[8], 'isEasyApply': row[9], 'isPromoted': row[10], 'applicantCount': row[11], 'url': row[12], 'query': row[13], 'category': row[14], 'timestamp':row[15]})
                    cnt += 1

if __name__ == '__main__':
    main()
#    addCollection() #working on Sri's data


