#
# Dockerfile
#
#
# Use node.js version 6 base image
FROM node:14.1.0-stretch


# Install pre-requisites
RUN npm install npm@latest -g 

# Create app directory
ENV APP_DIR /usr/src/app
RUN mkdir -p ${APP_DIR}
WORKDIR ${APP_DIR}

# Copy the source files

# Install dependencie


EXPOSE 80:81

CMD [ "npm", "start" ]