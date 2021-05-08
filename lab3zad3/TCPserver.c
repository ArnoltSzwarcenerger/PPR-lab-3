#include <stdio.h>
#include <stdlib.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>

int main(){
    char server_message[256] = "You have reached the server";

    //tworzenie socketa
    int server_socket;
    server_socket = socket(AF_INET, SOCK_STREAM, 0);
    
    //define the server address
    struct sockaddr_in server_address;
    server_address.sin_family = AF_INET;
    server_address.sin_port = htons(9002);
    server_address.sin_addr.s_addr = INADDR_ANY;
    
    //bind the socket to our specified IP and sin_port
    bind(server_socket, (struct sockaddr *) &server_address, sizeof(server_address));
    
    //nasluchiwanie
    listen(server_socket, 5);
    
    int client_socket;
    client_socket = accept(server_socket, NULL, NULL);
    
    //zebranie wiadomosci
    char client_message[256];
    int count = recv(client_socket, &client_message, sizeof(client_message), 0);
    if(count == -1)printf("\nerror w recv()\n\n");

    printf("Wiadomosc od procesu II w postaci heksadecymalnej: %s\n", client_message);
    
    //zamkniecie socketa
    close(server_socket);
    
return 0;
}



