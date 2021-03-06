

	// COSC4345 Example 
	// This class provides an example of how to connect to a web server to retrieve
	// a Python script name, execute the script and print the return results

	package neverFail;

	import java.net.URL;
	import java.net.URLConnection;
	import java.net.MalformedURLException;
	import java.io.IOException;
	import java.io.InputStreamReader;
	import java.io.BufferedReader;
	import java.io.*;

public class JavaController {
	
		public static void main(String[] args) {
			try {
				
				// Create a url with a query string to get the next test to execute on this client
				//
				URL url = new URL("http://jbryan2.create.stedwards.edu/cosc4345/getNextTest.php?action=getScriptName");
				
				// Open the connection to the web server
				//
				URLConnection sock = url.openConnection();
				
				// Create a BufferedReader object to read the return results
				//
				BufferedReader reader = 
					new BufferedReader(new InputStreamReader(sock.getInputStream()));
				
				String result = null;
				String s = null;
				String script = null;
				
				boolean didTestScriptSucceed = false;
				
				// Read the return results and create a string with the python command to execute
				//
				while ((result = reader.readLine()) != null) {
					result = result.replace("\"",  "");
					script = "python" + result;
					System.out.println(result);  //new line
					System.out.println(script);  // new line
					
				}
				reader.close();
				
				// Now spawn another process to execute the Python script
				//
				Process p = Runtime.getRuntime().exec(script);
				BufferedReader stdInput = new BufferedReader(new
						InputStreamReader(p.getInputStream()));
				
				BufferedReader stdError = new BufferedReader(new
						InputStreamReader(p.getErrorStream()));
				
				// We need to know if the test script succeeded or failed
				// Replace this code with something that checks the return value for "SUCCESS"
				// For now, just print the return results
				//
				while ((s = stdInput.readLine()) != null) {
					
					if(s == "SUCCESS")
					{ 
						didTestScriptSucceed = true;
					}
					System.out.println(s);
				}
				System.out.println("standard error of the command (if any):\n");
				while ((s = stdError.readLine())!= null) {
					System.out.println(s);
				}
				
				// You may need to add more code here to return the SUCCESS or FAIL back to the - CODE ADDED (IF STATEMENT)
				// database for tracking purposes.  That code should go here
				
				URL url2 = new URL("http://team5-cosc.com/NeverFail.php?action=putResult&result=FAIL&description=IOErroException&SUTID=8");
				
			}
			catch(MalformedURLException e) {
				throw new RuntimeException(e);
			}
			catch(IOException e) {
				throw new RuntimeException(e);
				
			}
		}
	}


