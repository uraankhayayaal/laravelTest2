## START
```bash
cd ./docker/
docker-compose exec app composer update
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan test
```

## API URLS
New Author: POST http://localhost:3102/api/authors
```json
{
  "title": "Ayaal Kaplin"
}
```
New book: POST http://localhost:3102/api/books
```json
{
  "title": "A some story of Rodger Stone",
}
```
New book with attach author: POST http://localhost:3102/api/books
```json
{
  "title": "A some story of Rodger Stone #2",
  "authors": [1]
}
```
Show book: GET http://localhost:3102/api/books/{bookId}

Show books: GET http://localhost:3102/api/books

Show books by author: GET http://localhost:3102/api/authors/{authorId}/books