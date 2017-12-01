// COSC4345 Example
// This class provides an example of how to connect to a web server to retrieve
// a Python script name, execute the script and print the return results

package cosc4345ExamplePackage;
import java.util.Date;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.net.MalformedURLException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.BufferedReader;
import java.awt.List;
import java.io.*;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Locale;


public class neverFailSystem {
    
    
    public static void main(String[] args) {
        try {
        	
        	
            //Set the SUT ID
        	String sutId = "2";
  
        	
        	
        	
            //----------------------------------------------------------------------------------
            // Create a url with a query string to get the next test ID to execute on the client
            //
            URL url = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getTestId");
            
            
            // Open the connection to the web server
            //
            URLConnection sock = url.openConnection();
            
            
            // Create a BufferedReader object to read the return results
            //
            BufferedReader reader =
            new BufferedReader(new InputStreamReader(sock.getInputStream()));

            
            // Read the return results and create a string with the python ID to execute
            //
            String result = null;
            int responceCodeTestId=0;
            while ((result = reader.readLine()) != null) {
                result = result.replace("\"",  "");
                
                
                //Store result in variable and print the test ID to execute
                //
                String testId = result;
                System.out.println("================");
                System.out.println("TEST ID - " + testId);
          
                
                //Send/receive information from Command and Control
                //
                URL obj1 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&sutId=" +sutId +"&testId=" +testId);
                HttpURLConnection con = (HttpURLConnection) obj1.openConnection();
                con.setRequestMethod("GET");
                con.setRequestProperty("action", "getTest");
                con.setRequestProperty("sutId", sutId);
                con.setRequestProperty("testId", testId);
                
                //Execute connection and print to debug response from Command and Control
                //
                int responseCode = con.getResponseCode();
                //System.out.println("Response code: " + responseCode);
                System.out.println("================");
                responceCodeTestId = responseCode;
                
            }
            //Close the reader
            //
            reader.close();
            
            
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create another url with a query string to get the next test script name to execute on this client
            // 
            URL url2 = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getScriptName");
            
            
            // Open the connection to the web server
            //
            URLConnection sock2 = url2.openConnection();
            
            
            // Create a BufferedReader object to read the return results
            //
            BufferedReader reader2 =
            new BufferedReader(new InputStreamReader(sock2.getInputStream()));
            

            // Read the return results and create a string with the python command to execute
            //
            String result2 = null;
            String s = null;
            String script = null;
            while ((result2 = reader2.readLine()) != null) {
                result2 = result2.replace("\"",  "");
                script = "python "+result2;
                
                
                //Store result in variable and print the test name to execute
                //
                String scriptName = result2;
                System.out.println("TEST NAME - " +scriptName);
                System.out.println("================");
                
            }
            //Close the reader
            //
            reader2.close();
            
            
            
            

            
            //----------------------------------------------------------------------------------
            // Now spawn another process to execute the Python script
            //
            Process p = Runtime.getRuntime().exec(script);
            BufferedReader stdInput =
            new BufferedReader(new InputStreamReader(p.getInputStream()));
            
            
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create another url with a query string 
            //
            URL url5 = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getTestResultId");
            
            // Open the connection to the web server
            //
            URLConnection sock5 = url5.openConnection();
            
            // Create a BufferedReader object to read the return results
            //
            BufferedReader reader5 =
            new BufferedReader(new InputStreamReader(sock5.getInputStream()));
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Get the last testResultId from DB and store the python test results
            //
            String result5 = null;
            
            while ((result5 = reader5.readLine()) != null) {
                result5 = result5.replace("\"",  "");
                
                
                
                //Create an string array to capture python output
                //
				ArrayList<String> outputList = new ArrayList<String>();
				while ((s = stdInput.readLine()) != null) {
					outputList.add(s);               
                }
				
				//Store python output into variables
				//
				String testResult = outputList.get(0);
				String resultDescription = outputList.get(1);
				            
				            
                
				//Store result in variable and print test result, result description (if test fails) and test result ID
                //
                System.out.println("TEST RESULT - "+testResult);
                System.out.println("================");
                System.out.println("RESULT DESCRIPTION -  "+resultDescription);
                System.out.println("================");
                System.out.println("TEST RESULT ID - " + result5);
                System.out.println("================");
            	String fileName = "errorLog";
				if(testResult.contains("ERROR")){
					System.err.printf("Logging errors  '%s'  into the file -"+fileName +" %n" , testResult);

					DateFormat df = new SimpleDateFormat("dd/MM/yy HH:mm:ss");
					Date dateobj = new Date();

					BufferedWriter writer = new BufferedWriter(new FileWriter(fileName, true));
					writer.append(' ');

					writer.append("---------------------------------------------------------------------------------------" +"\n"
							+"Date: ["+df.format(dateobj) +"]  --" +testResult +"  -REASON --" +resultDescription +"-- testResuluId = "+result5 );

					if(responceCodeTestId == 200){
						writer.append("\n" +"Connection to Command & Control is SUCCESSFUL--- response code is "+responceCodeTestId 
								+"\n"+"---------------------------------------------------------------------------------------"  );
					}else{
						writer.append("\n" +"Connection to Command & Control is UNSUCCESSFUL--- response code is "+responceCodeTestId 
								+"\n"+"---------------------------------------------------------------------------------------"  );
					}
					writer.newLine();

					writer.close();

				}else{
					System.err.printf("NO errors being logged into a file '-----' %n" , testResult);
				}
                
                String testResultId = result5;
                
                
                
                
                
                //--------------------------------------------
                //Send/receive information from Command and Control
                //
                URL obj = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&result=" +testResult +
                                  "&resultDesc=" +resultDescription +"&testResultId=" +testResultId);
                HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                con.setRequestMethod("GET");
                con.setRequestProperty("action", "putResult");
                con.setRequestProperty("result", testResult);
                con.setRequestProperty("resultDesc", resultDescription);
                con.setRequestProperty("testResultId", testResultId);
                
                
                //Execute connection and print to debug response from Command and Control
                //
                int responseCode2 = con.getResponseCode();
                //System.out.println("Get response code[testresult] " + responseCode2);
                
                
            }			
            //Close the reader
            //
            reader5.close();
            
        }
        
        
        //Error handling
        //
        catch(MalformedURLException e) {
            throw new RuntimeException(e);
        }
        catch(IOException e) {
            throw new RuntimeException(e);
        }
        
        
        
    }
    
} //End

