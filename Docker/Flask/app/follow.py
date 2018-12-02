
from flask import Flask, jsonify, request
from socket import gethostname
import json
import urllib3
import pymysql


# create flask API
app = Flask(__name__)


@app.route('/UserSearch',methods=['POST'])
def getUsers():
	u = request.form['user']
	db = pymysql.connect("mysql","root","Passw0rd","user_settings" )
	cursor = db.cursor()
	cursor.execute("SELECT user_id FROM users WHERE user_id LIKE '%"+u+"%'")
	data = cursor.fetchall()
	#db.close()
	return jsonify(data), 201

@app.route('/FollowUser',methods=['POST'])
def follow():
	u = request.form['user']
	f = request.form['follow']
	db = pymysql.connect("mysql","root","Passw0rd","user_settings" )
	cursor = db.cursor()
	cursor.execute("INSERT INTO following(user, following) VALUES ('"+u+"','"+f+"')")
	db.commit()
	return "TRUE", 201

@app.route('/following',methods=['POST'])
def following():
	u = request.form['user']
	db = pymysql.connect("mysql","root","Passw0rd","user_settings" )
	cursor = db.cursor()
	cursor.execute("SELECT following FROM following WHERE user = '"+u+"'")
	data = cursor.fetchall()
	#db.close()
	return jsonify(data), 201

@app.route('/UnfollowUser',methods=['POST'])
def unfollow():
	u = request.form['user']
	f = request.form['follow']
	db = pymysql.connect("mysql","root","Passw0rd","user_settings" )
	cursor = db.cursor()
	cursor.execute("DELETE FROM following WHERE user = '"+u+"' AND following = '"+f+"'")
	db.commit()
	return "TRUE", 201




if __name__ == '__main__':
	app.run(host='0.0.0.0')

