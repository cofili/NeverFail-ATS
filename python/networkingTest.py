# Networking Test TBD
#ISSUE: READING THROUGHOUT.
#WORKS FOR OTHERS?


def main():
    import os
    import urllib.request
    import shutil

    #dowloads the url file, saves as a new file, reads
    try:
        link = 'http://jbryan2.create.stedwards.edu/'
        with urllib.request.urlopen(link) as response:
            html = response.read().decode("utf-8")
            f = open("networkingTest.txt", "w")
            for line in html:
                f.write(str(line))
            f.close()
            
        file_size = os.stat("networkingTest.txt").st_size
        if (file_size > 0):
           
            print("SUCCESS")
        else:
            raise ValueError ("ERROR")
        
    #Use error handling to avoid program to crash
    except ValueError as ve:
        print(ve)
        print("ValueError....Screenshot_was_not_created")
        sys.exit(0)
        
    except IOError:
        print("ERROR")
        print("IOERROR....File_not_found")
        sys.exit(0)   
        
    except urllib.error.URLError:
        print ("ERROR")
        print("URLERROT....There_is_no_network_connection")
        
    except urllib.error.HTTPError:
        print("ERROR")
        print("HTTPERROR....The_server_could_not_fulfill_the_client_request") #really an error?
        
        #raise standard error
    except Exception:
        print("ERROR")
        print("Exception_handling_caught_an_error")
        sys.exit(0)
    
    #raises an error not covered in error handling to avoid test to crash
    except:
        print("ERROR")
        print("Unexpected_error_occurred_while_running_the_test")
        sys.exit(0)  
main()