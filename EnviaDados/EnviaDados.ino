
#include <HTTPClient.h>
#include <WiFi.h>

const char* ssid = "GVT-80B9";//Nome da rede
const char* password = "81b6e0c049";//Senha da rede


HTTPClient http;//Função da biblioteca <HTTPClient.h> que pede requisições POST e GET


int enviaDados(int id){

     if ((WiFi.status() == WL_CONNECTED)) { //Se o wifi encontra-se conectado
      
        String envia;//Variavel que envia dados
                                    
        int retorno = verifica(id);//função que verifica se o id é cadastrado ou não
                                   //variavel retorno recebe 1 ou 0    
        
        Serial.println("Aguarde...");
        http.end(); //Limpa a saida de dados
        delay(10000);//atraso para proxima consulta
        Serial.println("OK");
        
        if(retorno == 0){//Se o retorno for igual a 0 o usuario não possui cadastro
          
           int i=1;//variavel auxiliar

           //LOOP para caso ocorra um erro no envio de dados ele reenvie o dado
           do
           {
              //http.begin("http://helloworld321.atwebpages.com/dado.php");//Especifico a url a qual desejo enviar o dado
              
              http.begin("http://192.168.1.4/biometria/dado.php");                                                    
              http.addHeader("Content-Type", "application/x-www-form-urlencoded");//Especifico o tipo de conteudo que vou enviar,Isso é apenas utilizado em requisições POST(envio de dados)
              
              envia = "id="+String(id);//envia ira receber essa mensagem "id="+String(id)
                                      //"id=" é uma variavel do php que vai receber o numero que o usuario digitou no caso String(id), o + é para fazer uma concatenação
                                      //como id e um tipo inteiro faço uma conversão para String ou char,Porque http não permite enviar variaveis inteiras,float,double,boolean,etc...  
                                                               
              int httpCode = http.POST(envia);//httpCode verifica se o dado foi enviado 
                                              //http.POST(envia) aqui o http. pede pro POST enviar via HTTP a variavel envia
             
              if(httpCode > 0)//Se o valor retornado for maior do que 0 
              { 
                  //Sucesso ao enviar
                  Serial.print("Dado enviado");
                  Serial.println(httpCode);//Codigo do envio
                  Serial.println("Aguarde...");
                  http.end(); //Limpa a saida de dados
                  delay(10000);//atraso para proxima consulta
                  Serial.println("OK"); 
                  i=0;//0 é diferente de 0 = falso
                      //sai do loop     
              }
              else 
              {
                  //Ocorreu um erro ao enviar,reenvia atraves do loop
                  Serial.println("Erro Nao foi possivel enviar o dado");
                  Serial.println("Reenviando.....");
                  Serial.println("Aguarde...");
                  http.end();//Limpa a saida de dados
                  delay(10000);//atraso para proxima consulta
                  Serial.println("OK");  
              }

                  
           }while(i != 0);//Se i for diferente de 0,continua no loop

           return 0;//retorna 0 para variavel condicao
        
        }
        else //o retorno é igual a 1 usuario ja possui cadastro
        {
           registra(id);
           Serial.println("Aguarde...");
           http.end();//Limpa a saida de dados
           delay(10000);//atraso para proxima consulta
           Serial.println("OK");  
           return 0;//retorna 0 para variavel condicao
        }
  
     } 
}

int registra(int id){
  
       String envia;
       int i=1;//variavel auxiliar
      
      //LOOP para caso ocorra um erro no envio de dados ele reenvie o dado
      do
      {
  
          http.begin("http://192.168.1.4/biometria/dado.php");  
          http.addHeader("Content-Type", "application/x-www-form-urlencoded");                                                                        
          
          envia = "id2="+String(id);//envia ira receber essa mensagem "id="+String(id)
                                      //"id=" é uma variavel do php que vai receber o numero que o usuario digitou no caso String(id), o + é para fazer uma concatenação
                                      //como id e um tipo inteiro faço uma conversão para String ou char,Porque http não permite enviar variaveis inteiras,float,double,boolean,etc...  
                                                               
          int httpCode = http.POST(envia);//httpCode verifica se o dado foi enviado 
                                              //http.POST(envia) aqui o http. pede pro POST enviar via HTTP a variavel envia                            
          
          if (httpCode > 0)//Se o valor retornado for maior do que 0 
          { 
     
              Serial.println(httpCode);//Codigo da consulta
              Serial.println("Enviado");
              i=0;
  
          }
          else 
          {
             //Erro ao enviar,reenvia atraves do LOOP
              Serial.println("Erro Nao foi possivel verificar enviar o dado");
              Serial.println("Reenviando.....");
          }  
           
      }while(i != 0);//Se i for diferente de 0,continua no loop

  
}


int verifica(int id){
     
      int i=1;//variavel auxiliar
      
      //LOOP para caso ocorra um erro no envio de dados ele reenvie o dado
      do
      {
          //http.begin("http://helloworld321.atwebpages.com/processo.php?id="+String(id));//Especifico a url a qual desejo retorna dados pro ESP                                                                          
                                                                                       //processo.php? e aonde contem os dados, o "?" é para saber qual variavel ira armazenar o String(id)
                                                                                       //id="+String(id) realiza uma consulta em busca do id que a variavel String(id) armazena
                                                                                       //EX:Se tu ta lendo ate a aqui, copia esse link e testa http://helloworld321.atwebpages.com/processo.php?id=1
          http.begin("http://192.168.1.4/biometria/processo.php?id="+String(id));                                                                          
         
          int httpCode = http.GET();//httpCode verifica se o dado foi enviado 
                                   //http.GET(); aqui o http. pede pro GET solicitar uma consulta via HTTP
                                      
          
          if (httpCode > 0)//Se o valor retornado for maior do que 0 
          { 
              String imprime = http.getString();//variavel imprime recebe o valor da consulta
                                               //http.getString copia todos os dados contidos na consulta e armazena na variavel imprime 
              Serial.println(httpCode);//Codigo da consulta
              Serial.println(imprime);//Imprime os valores
              if(imprime != "[]"){//"[]" é tipo NULL, se imprime for diferente de []
                Serial.println("Usuario cadastrado");//O usuario possui cadastrado
                return 1;//retorna verdadeiro encerra loop
              }
              else
              {
                Serial.println("Usuario não cadastrado");//O usuario não possui cadastrado
                return 0;//retorna falso encerra loop
              }
              
          }
          else 
          {
             //Erro ao enviar,reenvia atraves do LOOP
              Serial.println("Erro Nao foi possivel verificar enviar o dado");
              Serial.println("Reenviando.....");
          }  
           
      }while(i != 0);//Se i for diferente de 0,continua no loop
  
}
void setup()
{
  Serial.begin(115200);
  Serial.printf("Connecting to %s ", ssid);//Imprime o nome da rede que esta conectando
  WiFi.begin(ssid, password);//Tenta conectar com o nome da rede e senha
  while (WiFi.status() != WL_CONNECTED) {//Fica preso nesse loop ate conectar
      delay(500);
      Serial.print(".");
  }
  //Apos conectar surge essas mensagens
  Serial.print("Conectado");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());//Mostra o IP da conexão

  //Menu
  Serial.println("\n1 - Enviar Dado");
  Serial.println("\nEscolha:"); 
  
}
void loop()
{
   int op=0,id=0,imprime=0,condicao=0;//op é uma opção do menu
                                    // id é uma variavel que ira receber o dado 
                                    // imprime é uma condição que mostra uma mensagem apenas uma vez
                                    // condicao é uma variavel que retorna verdadeiro ou falso
    
   if(Serial.available()){//Se o usuario escrever algo no monitor serial
    
      op = Serial.parseInt();//variavel op ira receber numeros inteiros
         
      switch(op)
      {
         //Por enquanto só uma opção
         case 1://Caso o usuario digite 1
         
           imprime = 1;// imprime = 1 ou verdadeiro
           
           while(imprime != 0){//1 é diferente de 0 = verdadeiro
                               // então entra no loop
                               //enquanto imprime for diferente de 0 ele vai imprimir
                               
             Serial.println("Digite o ID:");//Imprime
             imprime=0;//imprime é igual a 0
                       //0 é diferente de 0 = falso
                      //sai do loop
           }
           
           while(id == 0){//id é igual a 0 
                          //0 é igual a 0 = verdadeiro
                          //entra no loop  
             id = Serial.parseInt();//variavel op ira receber numeros inteiros
                                    //apos o usuario digitar o id recebe outro numero
                                    //se o numero for diferente de 0 ele sai do loop  
           }
           
           condicao = 1;//condicao = 1 ou verdadeiro 
           while(condicao != 0){//1 é diferente de 0 = verdadeiro
                               // então entra no loop
                               
              Serial.println("Enviando....");
              condicao = enviaDados(id);//Essa função envia o id
                                       //apos o fim dessa função
                                       //ela retorna 0 pra condicao
                                       //0 é diferente de 0 = falso
                                       //sai do loop  
           }
           break;//fim da opção 
    
      }  
   }
   
}
