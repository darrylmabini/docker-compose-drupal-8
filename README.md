## Manually Download Drupal Code

```console
curl -fSL "https://ftp.drupal.org/files/projects/drupal-${DRUPAL_VERSION}.tar.gz" -o drupal.tar.gz; \
	echo "${DRUPAL_MD5} *drupal.tar.gz" | md5sum -c -; \
	tar -xz --strip-components=1 -f drupal.tar.gz; \
	rm drupal.tar.gz;
```
