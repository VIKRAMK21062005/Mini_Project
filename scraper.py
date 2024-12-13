import requests
from bs4 import BeautifulSoup

# Send a GET request to the website
url = 'https://books.toscrape.com/'
response = requests.get(url)

# Parse the HTML content using Beautiful Soup
soup = BeautifulSoup(response.content, 'html.parser')

# Find all the book titles, prices, and availability
books = soup.find_all('article', class_='product_pod')

# Print the table header
print('Title\t\t\t\t\tPrice\t\tAvailability')

# Loop through each book and extract its title, price, and availability
for book in books:
    title = book.h3.a['title']
    price = book.select('.price_color')[0].get_text()
    availability = book.select('.availability')[0].get_text().strip()
    print(f'{title}\t\t{price}\t{availability}')
