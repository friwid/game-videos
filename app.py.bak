from flask import Flask, request, render_template
from flask_sqlalchemy import SQLAlchemy
from flask_bcrypt import Bcrypt
from dotenv import load_dotenv
import os

# Load environment variables
load_dotenv()

app = Flask(__name__)
bcrypt = Bcrypt(app)

# Configure database
app.config['SQLALCHEMY_DATABASE_URI'] = f"mysql+pymysql://{os.getenv('DB_USER')}:{os.getenv('DB_PASS')}@{os.getenv('DB_HOST')}/{os.getenv('DB_NAME')}"
db = SQLAlchemy(app)

class Users(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    user_name = db.Column(db.String(80), unique=True, nullable=False)
    user_password = db.Column(db.String(120), nullable=False)
    user_email = db.Column(db.String(120), unique=True, nullable=False)

@app.route('/')
def home():
    return render_template('home.html', alias='Home')

@app.route('/register', methods=['POST'], alias='Register')
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = bcrypt.generate_password_hash(request.form['password']).decode('utf-8')
        email = request.form['email']

        new_user = Users(user_name=username, user_password=password, user_email=email)
        db.session.add(new_user)
        db.session.commit()

        return "Registration successful!"
    return render_template('register.html')
        
@app.route('/registerfunction', methods=['POST'], alias='Registerfunction')
def registerfunction():
    if request.method == 'POST':
        username = request.form['username']
        password = bcrypt.generate_password_hash(request.form['password']).decode('utf-8')
        email = request.form['email']

        new_user = Users(user_name=username, user_password=password, user_email=email)
        db.session.add(new_user)
        db.session.commit()

        return "Registration successful!"

if __name__ == '__main__':
    app.run(debug=True)
