pipeline {
  agent none
  stages {
    stage('Testing') {
      steps {
        bat(returnStatus: true, script: 'bat \'set\'')
      }
    }
  }
  environment {
    test = 'tesing'
  }
}