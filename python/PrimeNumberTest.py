#TBD
#Prime Number test: Measures how fast the CPU can search for prime numbers. 
 
	#TBD
	#Prime Number test: Measures how fast the CPU can search for prime numbers. 
	 
import os 
import time
import math 
import sys


def is_prime(n):

    
    i = 2
    while i < n:
        if n%i == 0:
            return False
        i += 1
    return True

n = 100 #int(raw_input("What number should I go up to? "))

p = 2
while p <= n:
    if is_prime(p):
        print p,
    p=p+1

print "Done"

max_time = 5
start_time = time.time()
time.sleep(5) #Adds time to execution to force error
time_delta = time.time() - start_time
	    
	    
	    #Raise error if time duration does not meet test requirement; otherwise returns SUCCESS
try:  
	        if time_delta > max_time:   
	            raise ValueError("ERROR")
	        
except ValueError as ve:
	        print(ve)
	        print("ValueError: CPU is too slow")
	        sys.exit(0)
	
else:    
	        print("SUCCESS")
	        print("No-errors-testing")
	        #print(Time of execution: " + repr(round(time_delta,2)) + " seconds")
	               
print (time_delta)      

