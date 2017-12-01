// COSC4345 Example.Alibrahim
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




public class COSC4345Example_Alibrahim {
    
    
    public static void main(String[] args) {
        try {
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create a url with a query string to get the next test to execute on this client
            //
            URL url3 = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getTestId");
            
            // Open the connection to the web server
            //
            URLConnection sock3 = url3.openConnection();
            
            // Create a BufferedReader object to read the return results
            
            //
            BufferedReader reader3 =
            new BufferedReader(new InputStreamReader(sock3.getInputStream()));
            
            
            
            
            String result3 = null;
            String s3 = null;
            
            
            // Read the return results and create a string with the python command to execute
            //
            
            int responceCodeTestId=0;
            while ((result3 = reader3.readLine()) != null) {
                result3 = result3.replace("\"",  "");
                
                
                String testId = result3;
                System.out.println("================");
                System.out.println("running TestId #("+testId +")");
                System.out.println("================");
                
                
                
                
                
                
                
                String sutId = "2";
                
                URL obj1 = new URL("http://cosc4345-team5.com/features/getTest.php?action=getTest&sutId=" +sutId +"&testId=" +testId);
                HttpURLConnection con1 = (HttpURLConnection) obj1.openConnection();
                con1.setRequestMethod("GET");
                con1.setRequestProperty("action", "getTest");
                con1.setRequestProperty("sutId", sutId);
                con1.setRequestProperty("testId", testId);
                int responseCode1 = con1.getResponseCode();
                System.out.println("Get response code[sutId + testId] " +responseCode1);
                responceCodeTestId = responseCode1;
                
                
            }
            
            reader3.close();
            
            
            
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create a url with a query string to get the next test to execute on this client
            //
            URL url = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getScriptName");
            
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
            
            // Read the return results and create a string with the python command to execute
            //
            
            
            while ((result = reader.readLine()) != null) {
                result = result.replace("\"",  "");
                script = "python "+result;
                
                String scriptName = result;
                
                System.out.println("scriptName: -"+scriptName +"-");
                System.out.println("================");
                
                
                
            }
            
            reader.close();
            
            
            
            // Now spawn another process to execute the Python script
            //
            Process p = Runtime.getRuntime().exec(script);
            BufferedReader stdInput = new BufferedReader(new
                                                         InputStreamReader(p.getInputStream()));
            
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // Create a url with a query string to get the next test to execute on this client
            //
            URL url2 = new URL("http://cosc4345-team5.com/features/getNextTest.php?action=getTestResultId");
            
            // Open the connection to the web server
            //
            URLConnection sock2 = url2.openConnection();
            
            // Create a BufferedReader object to read the return results
            
            //
            BufferedReader reader2 =
            new BufferedReader(new InputStreamReader(sock2.getInputStream()));
            
            
            
            
            
            //----------------------------------------------------------------------------------
            // get the last testResultId from DB.
            //----------------------------------------------------------------------------------
            // Read the return results and create a string with the python command to execute
            //
            
            String result2 = null;
            String s2 = null;
            
            
            while ((result2 = reader2.readLine()) != null) {
                result2 = result2.replace("\"",  "");
                
                
                //Create an string array to capture python output
                ArrayList<String> outputList = new ArrayList<String>();
                while ((s = stdInput.readLine()) != null) {
                    outputList.add(s);
                    
                    //System.out.println(s);
                    
                }
                //put python output into variables
                String testResult = outputList.get(0);
                String resultDescription = outputList.get(1);
                
                
                
                
                System.out.println("test result:--> "+testResult);
                System.out.println("================");
                System.out.println("Result description:---> "+resultDescription);
                System.out.println("================");
                System.out.println("testResultId # ("+result2 +")");
                System.out.println("================");
                String fileName = "errorLog";
                if(testResult.contains("ERROR")){
                    System.err.printf("Logging errors  '%s'  into the file -"+fileName +" %n" , testResult);
                    
                    DateFormat df = new SimpleDateFormat("dd/MM/yy HH:mm:ss");
                    Date dateobj = new Date();
                    
                    BufferedWriter writer = new BufferedWriter(new FileWriter(fileName, true));
                    writer.append(' ');
                    
                    writer.append("---------------------------------------------------------------------------------------" +"\n"
                                  +"Date: ["+df.format(dateobj) +"]  --" +testResult +"  -REASON --" +resultDescription +"-- testResuluId = "+result2 );
                    
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
                
                String testResultId = result2;
                
                //--------------------------------------------
                URL obj = new URL("http://cosc4345-team5.com/features/getTest.php?action=putResult&result=" +testResult +
                                  "&resultDesc=" +resultDescription +"&testResultId=" +testResultId);
                HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                con.setRequestMethod("GET");
                con.setRequestProperty("action", "putResult");
                con.setRequestProperty("result", testResult);
                con.setRequestProperty("resultDesc", resultDescription);
                con.setRequestProperty("testResultId", testResultId);
                int responseCode11 = con.getResponseCode();
                System.out.println("Get response code[testresult] " +responseCode11);
            }	//end while ((result2 = reader2.readLine()) != null) 	
            reader2.close();
            //----------------------------------------------------------------------------------	
            //----------------------------------------------------------------------------------
        }//end try
        
        
        
        
        catch(MalformedURLException e) {
            throw new RuntimeException(e);
        }
        catch(IOException e) {
            throw new RuntimeException(e);
            
        }
        
        
        
    }
    
}

