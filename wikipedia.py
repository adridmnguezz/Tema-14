import requests
from bs4 import BeautifulSoup

# Hacemos una petición a una página web
url = "https://es.wikipedia.org/wiki/Portal:Actualidad"  # Puedes cambiar esta URL por la que prefieras
response = requests.get(url)

# Creamos objeto BeautifulSoup
soup = BeautifulSoup(response.text, "html.parser")

# Extraemos título de la página
titulos = soup.find_all(["h2", "h3"])

for titulo in titulos:
    print(titulo.get_text())