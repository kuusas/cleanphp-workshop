pipeline {
  agent any
  stages {
    stage('Checkout') {
      steps {
        git(url: 'https://github.com/cleanphplt/cleanphp-workshop', branch: 'master', changelog: true)
      }
    }
    stage('Test') {
      steps {
        sh './vendor/bin/simple-phpunit'
      }
    }
    stage('Artifact') {
      steps {
        archiveArtifacts(onlyIfSuccessful: true, artifacts: 'release')
      }
    }
  }
  environment {
    APP_ENV = 'test'
  }
}