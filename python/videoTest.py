#ISSUE: change file saving location (currently at java). 
#ISSUE: why error is printed twice??
#WORKS FOR OTHERS?
import sys
import os
import time
from PIL import ImageGrab


def main():
    
    #set max time of task execution
    max_time = 2
    start_time = time.time()
    run()
    #time.sleep(max_time)   #Adds time to execution to force error
    time_delta = time.time() - start_time
    
    try:
        if time_delta > max_time:   
            raise ValueError("ERROR")
    
    except ValueError as ve:
        print(ve)
        print("ValueError: task execution time is below expected result")
        sys.exit(0)

    else:    
        print("SUCCESS")
    
    
    
    
def run():
    
    try:
        #Takes a screenshot of the partial display and saves as a PNG file
        ImageGrab.grab().save("screen_capture.png", "PNG")
        
        #checks size of file 
        image_size = os.stat("screen_capture.png").st_size
        if (image_size == 0):
            raise ValueError("ERROR")
    
    except ValueError as ve:
        print(ve)
        print("ValueError: Screenshot was not created")
        sys.exit(0)
        
    except IOError:
        print("ERROR")
        print("IOERROR: Screenshot file not found")
        sys.exit(0)
        
    #raise standard error
    except Exception:
        print("ERROR")
        print("Exception handling caught an error")
        sys.exit(0)
    
    #raises an error not covered in error handling to avoid test to crash
    except:
        print("ERROR")
        print("Unexpected error occurred while running the test")
        sys.exit(0)

        
main()