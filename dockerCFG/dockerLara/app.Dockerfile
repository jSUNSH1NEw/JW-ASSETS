#
# Dockerfile
#
#

# Use node.js version Dockerhub image base image
FROM node:stretch-slim


# Install pre-requisites
RUN sudo install php-cli php-mbstring php-xml

# Create app directory
ENV APP_DIR /usr/src/
RUN mkdir -p ${APP_DIR}
WORKDIR ${APP_DIR}


# Install dependencies
ADD 
RUN npm install npm@latest -g
RUN npm i -g react-native-cli

# Build the Application
RUN expo init

EXPOSE 19000
EXPOSE 19001
EXPOSE 19002

CMD [ "npm", "start" ]