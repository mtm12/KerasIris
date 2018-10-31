from keras.models import load_model
import numpy as np
from flask import Flask, abort, jsonify, request

app = Flask(__name__)
irisModel = None

@app.route("/iris/api", methods=['POST'])
def make_predict():
	data = request.get_json(force=True)
	predict_request = [data['sl'],data['sw'],data['pl'],data['pw']]
	predict_request = np.array([predict_request])
	y_pred = irisModel.predict(predict_request)
	return jsonify({'setosa': str(y_pred[0][0]),
		'versicolor': str(y_pred[0][1]),
		'virginica': str(y_pred[0][2])}), 201
	
@app.route("/test/api")
def hello():
	a = "20"
	return jsonify({'value': a}), 201

if __name__=='__main__':
	print("loading iris model")
	irisModel = load_model('iris_model.h5')
	print("iris model loaded")
	app.run(host='132.148.22.25', port=5000)