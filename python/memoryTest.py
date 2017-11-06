#Tests major subsytem: Memory
#Memory is tested based on duration of task processing
#Creates 1MB file with consecutive integers, and loops 5 times. Takes time of execution to analyze memory speed. Tests for error handling, success, and failure scenarios.
import sys
import time
    

def main():
    #sets max time of task execution
    max_time = 10
    start_time = time.time()
    run()
    #time.sleep(10) #Adds time to execution to force error
    time_delta = time.time() - start_time
    
    
    #Raise error if time duration does not meet test requirement; otherwise returns SUCCESS
    try:  
        if time_delta > max_time:   
            raise ValueError("ERROR")
        
    except ValueError as ve:
        print(ve)
        print("ValueError: memory is too slow")
        sys.exit(0)

    else:    
        print("SUCCESS")
        #print(Time of execution: " + repr(round(time_delta,2)) + " seconds")
                
  

def run():
    #list_count = 0
    try:
        for i in range(5):
            myList = list(range(1000000))   
            #list_count += 1
            #print("List", list_count, "created")
            
        index = (len(myList))
        #myList[index+1] #Force IndexError to be raised
            
    except MemoryError:
        print("ERROR") 
        print("MemoryError: the operation ran out of memory")
        sys.exit(0)
    
    except IndexError:
        print("ERROR")
        print("IndexError: list index is out of range" )
        sys.exit(0)
        
    #raises standard error
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