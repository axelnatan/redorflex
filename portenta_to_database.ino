#include <WiFi.h>

const char* ssid = "dubaddu"; 
const char* password = "wariwari"; 

const char* server = "redorflex.groupdeku.tech"; 
const int port = 80; 

//const char* database = "groupdek_axelino"; 
//const char* username = "groupdek_axelino"; 
//const char* password_db = "passwordeopoiki"; 

int potPin = A0;
int potValue = 0; 

void setup() {
  Serial.begin(9600);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");
}

void loop() {
  potValue = analogRead(potPin);

  WiFiClient client;

  if (client.connect(server, port)) {
    Serial.println("Connected to server");

    String url = "/add_data.php"; 
    String data = "value=" + String(potValue);

    client.println("POST " + url + " HTTP/1.1");
    client.println("Host: " + String(server));
    client.println("Connection: close");
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.println("Content-Length: " + String(data.length()));
    client.println();
    client.print(data);

    Serial.println("Data sent to server");
    
    while (client.connected()) {
      if (client.available()) {
        String response = client.readStringUntil('\r');
        Serial.println(response);
      }
    }

    client.stop();
  } else {
    Serial.println("Connection failed");
  }

  delay(1000);
}
