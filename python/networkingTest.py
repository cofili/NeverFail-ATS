# Networking Test TBD
def main():
    import os
    import urllib.request
    import shutil

    #dowloads the url file, saves as a new file, reads
    try:
        link = 'http://jbryan2.create.stedwards.edu/'
        with urllib.request.urlopen(link) as response:
            html = response.read().decode("utf-8")
            for line in html:
                print(line)
            #need code to read specific textto finish testing!!
            print("SUCCESS")
    except urllib.error.URLError:
        print("ERROR. There is no network connection")
    except urllib.error.HTTPError:
        print("ERROR. The server could not fulfill the client request") #really an error?
        
main()