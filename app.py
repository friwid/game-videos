from flask import Flask
import logging

app = Flask(__name__)

@app.route('/')
def home():
    app.logger.info('Info level log!')
    app.logger.warning('Warning level log!')
    return "Hello, World!!"

if __name__ == '__main__':
    app.run(debug=True)