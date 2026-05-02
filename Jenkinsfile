pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                echo 'Checking out code...'
            }
        }
        stage('Deploy to Staging') {
            steps {
                echo 'Deploying to /var/www/html/staging'
            }
        }
        stage('Run Tests') {
            steps {
                echo 'Running test.py'
            }
        }
        stage('Deploy to Production') {
            steps {
                echo 'Deploying to /var/www/html'
            }
        }
    }
}
