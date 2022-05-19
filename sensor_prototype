#include <SoftwareSerial.h>
#include "DHT.h" //Include Sensor Library
#define DHTPIN 7 //Pin 7 sensor input
#define DHTTYPE DHT11 //Sensor Type
#include <ArduinoJson.h> //Json Library
DHT dht(DHTPIN, DHTTYPE); //Defines pin and sensor type

String Arsp, Grsp;
SoftwareSerial simSerial(3, 2); // RX, TX 

void setup() {
  Serial.begin(9600);
  simSerial.begin(9600);
  dht.begin(); // initialise the sensor
}

void loop()
{
  SendData(); // Main Function
  delay(60000); // 1 mintute delay
}

void SendData(){
  Serial.println("Initialising..");
  if ( simSerial.available())
    Serial.write( simSerial.read());
    
    simSerial.println("AT"); //Checking communication between the module and computer
    delay(3000);
 
    simSerial.println("AT+SAPBR=3,1,\"Contype\",\"GPRS\""); //Sets connection type to GPRS
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+SAPBR=3,1,\"APN\",\"giffgaff.com\"");//Joins Giffgaff APN
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+SAPBR=1,1"); // Enable the GPRS
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPINIT"); //Enable HTTP Mode
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPPARA=\"CID\",1"); //Set up HTTP Bearer token
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPPARA=\"URL\",\"http://www.***********.****/listen.php\""); //Set Server address
    delay(3000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPPARA=\"CONTENT\",\"application/json\""); //Set HTTP content type to json
    delay(4000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPDATA=192,10000"); //Set data amount and when to expect data
    delay(5000);
    SendJson(); //Get sensor reading and send json data
    delay(6000);
    ShowSerialData();
 
    simSerial.println("AT+HTTPACTION=1"); //Set action to POST
    delay(6000);
    ShowSerialData();
 
   simSerial.println("AT+HTTPREAD"); //Get server response
   delay(6000);
   ShowSerialData();
 
   simSerial.println("AT+HTTPTERM"); //End HTTP Connection
   delay(10000);
   ShowSerialData;
  }
 
void ShowSerialData()
{
  while ( simSerial.available() != 0) //Display AT responce
    Serial.write( simSerial.read());
  delay(1000);
}

float GetTemp(){
    float temp = dht.readTemperature(); //Get Temperature reading
    return temp;
}
float GetHumi(){
    float humi  = dht.readHumidity(); //Get Humidity reading
    return humi;
}

void SendJson(){

  StaticJsonDocument<200> doc; //Create json with readings
  doc["ID"] = "Sen01";
  doc["T"] = GetTemp();
  serializeJson(doc, simSerial);
}
