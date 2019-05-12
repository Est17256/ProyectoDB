#Proyecto Bases de Datos
#Conexion a Base de Datos con Mongo
#Publicacion en Tweeter de los 5 mejores resultados
#Luis Esturban 17256
#Gustavo De Leon 17085
#David Soto 17551
#Miguel Valle 17102
#Importamos los  modulos de Mongo y Tweeter para el request y envio de Tweet
import tweepy
import pymongo

#Creamos un cliente Mongo para hacer peticiones a la base de datos y coleccion
myclient = pymongo.MongoClient("mongodb://localhost:27017/")
mydb = myclient["prueba"]
mycol = mydb["prueba"]

#myquery = { "title": "Ing. Software" }

#Se hace un query para la busqueda de compras
myquery = { }

#Se hace la busqueda
mydoc = mycol.find(myquery, {"_id": 0, "id": 0})

#Se imprimen los 5 mejores resultados
for i in range(5):
    print(mydoc[i]['title'])

#Se crean las variables para el request a Tweeter del API
#Detalles personles
consumer_key ="xPIiiGC15oh7HutUn7UJEA9xt"
consumer_secret ="AQm4RXhBlgVBGGQGoToNAMKMlRF17CTNo4KRaiRhUqVNGLyzy8"
access_token ="3171113016-jrIN8TQYa6O2bAwrYo03r0QCqrRxH5rtMBxm08e"
access_token_secret ="n2dg4AkTRy4yqPKLjlqzYE0LI8mr93RSXj27zhSyFAaOE"
  
#Se hace la autentifiacion a la cuenta de Tweeter 
auth = tweepy.OAuthHandler(consumer_key, consumer_secret) 

#Se hace la autentificacion de Token y Token secreto al API
auth.set_access_token(access_token, access_token_secret) 
api = tweepy.API(auth) 

#Se crea el texto a publicar
texto = "Los 5 mejores clientes son:\n1. "+mydoc[4]['title']+ \
        "\n2. "+mydoc[1]['title']+"\n3. "+mydoc[2]['title']+ \
        "\n4. "+mydoc[3]['title']+"\n5. "+mydoc[0]['title']+" "

#Se hace el Tweet
api.update_status(status = texto) 
