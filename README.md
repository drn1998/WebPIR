# WebPIR
WebPIR is a tool that allows the user to perform **Private Information Retrieval**. This is a method of gaining knowledge and doing research without disclosing what you actually wanted to know.

The basic idea is to answer something by asking for a set of data that can unambiguously answer the question while being much broader. Want to find out whether [Albert Calmette](https://www.wikidata.org/wiki/Q437983) was a bacteriologist? (he was.) Ask for a list of all bacteriologists and look if he is listed or not. No external observer, even with perfect control over your computer, can tell what you wanted to know. Want to hide that you are interested in bacteriology in the first place? Get all people who have an [occupation](https://www.wikidata.org/wiki/Property:P106) that starts with a 'b' and also let the table contain the specific occupation. (Actually, using the first letter of the alphabet is bad for several reasons. PIR codes are a better method, which I will describe soon.)

# Setup
At this moment, it is sufficient to copy the content of the src directory into the webservers directory and have the server recognize "index.php" as the default page. You then have to edit the config file of the two API clients (wikidata.ini and openstreetmap.ini) to contain your name and phone/fax number to comply with the wikidata policy of providing contact data (for their convenience and possible need to contact you, they are also provided to OSM). The default values will not be accepted by the software and it will refuse a connection to the API endpoint. Please provide correct information so wikidata can contact you if the software or its amount of usage becomes an issue.

# Try it out
Usually, WebPIR is hosted at https://darius-runge.eu/pir. Feel free to try it out but please acknowledge the rate limiting imposed by wikidata.

# Contact

Darius Runge  
Postfach 3  
72669 Unterensingen  
GERMANY

(registered mail is possible from most UPU-countries)

Tel: +49(0)7022 5064970  
Fax: +49(0)7022 5064971  
Vox: +49(0)7022 5064998  (immediate connection to voice mail, without attempting to talk in person)

E-Mail: contact@darius-runge.eu  
