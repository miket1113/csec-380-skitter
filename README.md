# skitter

Final project for csec-380 

Authors:
* Michael Terranova
* Michael Rhodes
* Nicole Holden

Concept art only. Final version will be different, see below for project description.
![Alt text](SkitterV2.png?raw=true "WARNING: Concept art only - What skitter could look like.")

**How to run:**
To run this script, simpily go into the Docker folder and in your terminal run:

bash build.sh

This will change your teminal to allow elasticsearch to have the memory it needs, and will build all docker files for you, once it is complete, it will run "docker-compose up". Once that completes you will be able to interact with the project

To exit, press CTRL+C, once it exits, enter the command "docker-compose down"


**Description:**

(WIP) Skitter is a platform for RIT users to communicate their thoughts via short skits. A skit is a short
text only message of 140 characters or less. Users will be able to create a custom display name, designate
an email and upload a profile picture via settings. They will also be able to follow/unfollow other users
so that those users messages will appear on their main message feed. Users will be able to add new skits
or delete their own skits either as a new skit, or as a reply to an existing skit. Users will authenticate
to the system using RIT's exposed LDAP server.(WIP)

**Objectives/Goal:** 

You are charged with developing a heavily user-centric web application. This web application will demonstrate 
fluency in complex web application security notions across various platforms. This will be accomplished by 
using multiple different platforms as part of web application designed around the micro-service architecture 
concept. Students will also demonstrate their familiarity with industry accepted development practices by 
using common development techniques as part of the project. 
 
**Deliverables:** 

 * Dockerfiles and associated Docker-compose file 
 * Design Documents 
 * A zip of your repository 
 * A writeup that answers the questions outlined in the project 

**Requirements:** 
* Docker-Compose: https://docs.docker.com/compose/


**Authentication** 

  Authentication is peformed via a Java microservice using Maven and the Spring framework. The authentication service should run locally, with no public access using proper docker settings. When a request is made to the /login page of the service with credentials, the service will respond back with true or false indicating successful authentication. Credentials are not stored or used anywhere in the system.
  Entry Points:
  * /login: Requires - username=<un>&password=<pw> in the body of a POST request.
  * /isAuthenticated - WIP - This feature works locally but it is unknown if it works for multiple sessions yet.
 
 **Settings**
 <WIP>
 
 **Session Management**
 <WIP>
 
 **Following/Unfollowing Users**
 <WIP>
 
 **Skit Creation/Deletion**
 <WIP>
 
**TODO:**
Requirements and instructions for use will go here as the project develops.
