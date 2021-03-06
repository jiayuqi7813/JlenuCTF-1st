#include <iostream>
#include <ostream>
#include <string>
#include <stdio.h>
#include <sys/ptrace.h>
#include <stdlib.h>
#include <unistd.h>
#include <cstring>
class Train {
	public:
		void intro(void);
		void help(void);
		void leave();
		void win(int);

		//static auto chunk1 = DEF_OBFUSCATED("DW@Rog#f\%dd'");
		std::string name;
		std::string ssn;


		Train(std::string given_name, std::string given_ssn){
			name = given_name;
			given_ssn = ssn;
		}

};

void Train::help() {
	
	std::string hint = "LOVERTR";
	std::cout<<hint<<std::endl;
	int chunk1[9] = {6, 35, 51, 43, 39, 23, 6, 10, 52};
	std::cout<<chunk1<<std::endl;
	int g ;
	for(g = 0; g < 9; g++){
		std::cout<<std::to_string(chunk1[g])<<" ";
	}
	std::cout<<std::endl;
}

void Train::leave() {
	std::cout<<"Goodbye :-(\n"<<std::endl;
	exit(0);
}

void Train::intro() {
	if (ptrace(PTRACE_TRACEME, 0, 1, 0) == -1){
		exit(1);
	}
	std::cout<<"Welcome to Snowywar's train, please fasten your seatbelts"<<std::endl;
	sleep(5);
}
void Train::win(int val){	
	if(val != 0){
		int x;
		int y;
		int chunk2[11] = {63,  124,  57,  50,  43,  11,  37,  45,  61,  9,  9};
		int chunk3[10] = {61,  58,  42,  9,  17,  32,  53,  59,  34,  50};

		for(x = 0; x < 11; x++){
			std::cout<<std::to_string(chunk2[x])<<" ";
		}
		std::cout<<std::endl;
		for(y = 0; y < 10; y++){
			std::cout<<std::to_string(chunk3[y])<<" ";
		}
		std::cout<<std::endl;
	}

}


int main(){
	int channels_list[4];
	//d is located at channels_list[-33]
	int d = 0;

	std::string ssn;
	std::string name;
	std::string option;

	int channel = 0;

	std::cout<<"Please enter your Social Security number (or national ID number)"<<std::endl;
	std::cin>>ssn;
	std::cout<<"Please enter your name"<<std::endl;
	std::cin>>name;
	Train t = Train(name, ssn);
	t.intro();
	while(1){
		std::cout<<"What would you like to do?"<<std::endl;
		std::cout<<"HELP/LEAVE/ENTERTAIN"<<std::endl;
		std::cin>>option;
		if (option == "LEAVE"){
			t.leave();
		}
		else if (option == "ENTERTAIN"){
			std::cout<<"Choose a channel between 0 and 4"<<std::endl;
			std::cin>>channel;
			channels_list[channel] = channel;
			std::cout<<"Now playing channel: "<<channel<<std::endl;
		}
		else if(option == "HELP"){
			t.help();
			t.win(d);
		}
		else{
			std::cout<<"Wake me up when it's over"<<std::endl;
			exit(0);
		}
	}
}
