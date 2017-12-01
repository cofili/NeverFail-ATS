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
    
    
    #check if execution time meets requirement
    try:
        if time_delta > max_time:   
            raise ValueError("ERROR")
    
    except ValueError as ve:
        print(ve)
        print("ValueError....Task_execution_time_is_below_expected_result")
        sys.exit(0)

    else:    
        print("SUCCESS")
        print("")                
  
    
    
    
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
        print("ValueError....Screenshot_was_not_created")
        sys.exit(0)
        
    except IOError:
        print("ERROR")
        print("IOERROR....Screenshot_file_not_found")
        sys.exit(0)
        
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