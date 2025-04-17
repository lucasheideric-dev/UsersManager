*** Settings ***
Library    RequestsLibrary

*** Variables ***
${BACKEND_URL}    http://backend:8000/api/login  # <-- Altere para o endpoint correto

*** Test Cases ***
Login com credenciais válidas
    Create Session    backend    ${BACKEND_URL}
    ${data}=    Create Dictionary    email=admin@email.com    password=123456
    ${response}=    POST On Session    backend    url=${BACKEND_URL}    json=${data}
    Should Be Equal As Numbers    ${response.status_code}    200
    Log    ${response.json()}

Login com credenciais inválidas
    Create Session    backend    ${BACKEND_URL}
    ${data}=    Create Dictionary    email=errado@email.com    password=senhaerrada
    ${response}=    POST On Session    backend    url=${BACKEND_URL}    json=${data}
    Should Be Equal As Numbers    ${response.status_code}    401
