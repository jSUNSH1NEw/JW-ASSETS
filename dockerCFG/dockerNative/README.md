DOCKER NATIVE 

================================Premier pas ===================================

Instalation de docker sous mac

ici nous allons utilisez docker deskop ou sont inclu les module docker suivant

Docker Engine, 	
Docker CLI client,
Docker Compose, 
Notary,
Kubernetes, 
Credential Helper. 

voici le lien pour l'installer  

->>>>>>>>>>>>>>> https://docs.docker.com/docker-for-mac/install/  

apres l'installation , lancez votre terminal et faite un docker --version
Pour verifiez que docker et ses module sont bien installez 

/!\                   Si ca te dit qui n'y a rien appele moi                     /!\ 




=================== PREMIER PAS : comprendre les 2 fichiers  principaux =====================

- Dockerfile 

(la ou on vas cree notre service)



- docker-composer.yaml

(la ou vas la utilisez notre service pour le deploiement sur un container  )


Comprendre ...........................


DOCKERFILE : tout d'abord  un Dockerfile et toujour cree avec un D majuscule ...
comme ceci : Dockerfile pas de . ou d'extenction qui le precede.


C'est dans se fichier que nous allons instruire  de commande a executer pour cree un envirronnement capable de reproduire les besoin une application native.
 

L'environement pour une application react native dois disposez tout dabord  de :

// Node.js 

ainsi que les dependance pour notre projet react-native qui sont 

*npm 

*expo 

*react-native-cli




================================= SECOND PAS ======================================

======================== la syntax d'un Dockerfile =================================


FROM : L'image de node sur la qu'elle on vas construire notre envirronement (pour notre app)

RUN : Lancez une commande sur notre image qui sera donc NODE

WORKDIR : Comparable au CD sous linux

ENV : cree un envirronement de variable 



================================= SECOND PAS ======================================

======================== la syntax d'un docker-compose.yaml =================================

VERSION:

SERVICE: 
	
	============== variable d'envirronnment (variable su service) ===============

images : l'image d'un envirronement ou module etant sur DOCKER-HUB exemple : images: mysql 5.7.1
 /!\ TU NE L'UTILISERA PAS COMME DANS L EXEMPLE /!\


build : Le fichier ou se trouve le docker file 

ports : les port sur les quelle ton container vas se delivrer 


volumes : ici tu peux peux dire de construire ton app dans un fichier que tu creera dans le meme fichier que ton docker compose 


====== ========= ======= ====== ====== ==== ====== ==== =====    ===== ====== ===== ==== =======

================================= TROISIEME PAS  ======================================

=================================== Commencons  =================================
Cree un fichier docker 
ensuite rendez-vous y avec VisualCodes

Telecharger les extension pour docker sur Visual code :

 1 : docker 

 2 : YAML  /!\ ET PAS YML /!\


Cree 2 fichier 

1 : Dockerfile 


2 : DockerCompose 


Dans le premier  voici se que vous aller renseigner  : 


========================================= Dockerfile   ======================================

===================================================================== =====================


		
				# Use node.js
				FROM node:14.1.0-stretch


				# Install pre-requisites
				RUN  npm install -g expo-cli && npm install npm@latest -g 

				# Create app directory
				ENV APP_DIR /usr/src/app
				RUN mkdir -p ${APP_DIR}
				WORKDIR ${APP_DIR}


				# Install dependencies
				RUN npm i -g react-native-cli


				EXPOSE 80:81

				CMD [ "npm", "start" ]

==================================================================================================

================================================================================================
======================================= docker-compose.yaml ====================================


					version: '3'
					 
					services:
					  node-native:
					    build: .
					    ports: 
					      - 8081:8081
					      - 8082:8082
					    volumes:
					      - ./myexpo:/docker/path


==================================================================================================

===================================  QUATRIEME PAS ====================================

/!\ Avant de continue quoi que se soit /!\

tout dabord crée un fichier myexpo & regardons se qu'il se passe dans nos 2 fichier docker



Quesque'il se passe dans notre Dockerfile : 
		FROM: node:14.1.0-stretch  = instalation de nodejs depuis le dockerHub , Stretch une version sans trop de dependance

		RUN   npm install npm@latest -g && npm install -g expo-cli = ici on n'installe les dependance  NPM & EXPO


		ENV APP_DIR /usr/src/app = cree un envirronement de variable comme ceci 
		RUN mkdir -p ${APP_DIR} = cree un fichier du nom de app_dir
		WORKDIR ${APP_DIR} = rentrer dans le fichier 

		RUN npm i -g react-native-cli = installez la dernier dependance pour react native 


		EXPOSE 80:81 = Le port que vous aller exposez ICI le port 80 reprense votre localhost et 81 celui de expo 

		CMD [ "npm", "start" ]  





Quesque'il se passe dans notre docker-compose.yaml :

Version :  la version de docker 

Service : le service que nous allons cree dans notre container 


/!\ Se service depends des variable  

	node-native: QUI est le nom de l'image ou je vais entréé des variable pour pouvoir touche mon Dockerfile car je veux qu'il l'utilise 

		 "j'aurai pu l'appeler CACA mais vaux mieux rester pro "

		build: . = ici j'appele le fichier dockerfile en appelant simplement la racine du dossier ou il se trouve 
		
		ports: = ici je rentre les port sur les quelle expo et notre app vont se deploiyer 

			- 8081:8081    = 8081 <- le port de ma machine -> le port que expo utilise :8081
			- 8082:8082    = 8082 <- le port de ma machine -> le port que expo utilise :8082 

		/!\ EXEMPLE : localhost:8081/ sera = au panel de dev expo /!\ 
		/!\ EXEMPLE : localhost:8082/ sera = a votre app /!\


		volumes: = ici je vais lui rentrer des variable de volume,
		 	   pour que que je puisse copier se qui se trouve dans le container docker, dans un fichier sur 
			   votre ordinateur. Ici le fichier que je vous avais demander de cree precédamant, le fichier 
			   "myexpo" qui se trouve dans le fichier docker sur votre bureau

		- ./myexpo:/docker/path = Ici nous allons constuire notre fichier myexpo avec se qui se trouve dans docker/path 


==================================================================== CINQUIEME PAS ==========================================================================	
========================================================== JVEUX MON DOCKER NATIVE MAINTENANT ===============================================================

Cliquer sur le fichier Dockerfile 

rendez vous dans le terminal sur vscode

Faite la commande 
	
	docker build 

& et attendez que l'application se build .....

si tous se passe bien & qu'il n'y a pas d'erreur vous pouvez faire cette commande 

 docker-compose up -d

vous aller voir le service se lancer... 

Si tous se passe bien vous pouvez vous rendre dans votre fichier avec la commande 

cd myexpo 

ensuite 
faite expo init nomdevotreapp –template blank 
   ou
      npm create-react-native-app  nomdevotreapp


rendez vous en suite sur votre navigateur et  faite localhost:8081/





		
	
























