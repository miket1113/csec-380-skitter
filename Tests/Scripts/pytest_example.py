import requests

#try make the request
try:
	r = requests.get('http://skitter.com')
	print(r)	# see the results

# catch a failue
except (requests.ConnectionError, requests.Timeout) as x:
	pass