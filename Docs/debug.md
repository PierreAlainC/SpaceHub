# Astuces Debug

## Réponse requète

```bash
dd($response->getContent());
```

```bash
$content = $response->getContent(false);
dump($response->getStatusCode(), $content);
die;
```