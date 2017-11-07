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
<<<<<<< HEAD
    if time_delta <= 10:             
        print("SUCCESS: Memory is fast. Total time of operation was " + repr(time_delta) + " seconds")
    else:
        print("ERROR: Memory is slow. Total time of operation was " + repr(time_delta) + "seconds")
    

=======
    
    
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
        print("No errors where encountered during test execution")
                
  

def run():
    #list_count = 0
    list_num = 5
    num_elements = 1000000
    
    #Create a certain amount of 1MB lists defined by list_num
    #with a certain amount of elements defined by num_elements
    try:
        for i in range(list_num):
            myList = list(range(num_elements))   
            #list_count += 1
            #print("List", list_count, "created")
            
        #Force error handling by uncommenting below two lines
        #index = (len(myList))
        #myList[index+1] 
            
    except MemoryError:
        print("ERROR") 
        print("MemoryError: the operation ran out of memory")
        sys.exit(0)
    
    except IndexError:
        print("ERROR")
        print("IndexError: list index is out of range" )
        sys.exit(0)
>>>>>>> 492abec026e3149d2c7965fee04e278c8dd9d0b7
        
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