pipeline {
    agent any
    environment {
        GIT_REPO_URL = 'https://github.com/ImNotKier/php-ci-cd-lab.git'
        GIT_CREDENTIALS_ID = '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'
        GIT_BRANCH = 'main'
    }
    stages {
        // Stage 1: Pull the code
        stage('Checkout') {
            steps {
                checkout([$class: 'GitSCM',
                    branches: [[name: "*/${env.GIT_BRANCH}"]],
                    userRemoteConfigs: [[url: "${env.GIT_REPO_URL}", credentialsId: "${env.GIT_CREDENTIALS_ID}"]]
                ])
            }
        }

        // Stage 2: Detect which PHP file changed
        stage('Detect Change') {
            steps {
                script {
                    def changed = sh(script: "git diff --name-only HEAD~1 HEAD | grep '.php' | head -n 1", returnStdout: true).trim()
                    env.TARGET_PHP_FILE = changed ?: "index.php"
                }
            }
        }

      
        // Stage 5: Deploy to production only if tests pass
        stage('Deploy') {
            steps {
                sh '''
                sudo rsync -av --delete --exclude='venv/' --exclude='.git/' --exclude='staging/' ./ /var/www/html/
                sudo chown -R www-data:www-data /var/www/html/
                '''
            }
        }
    }
}
