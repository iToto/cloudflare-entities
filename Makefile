.PHONY: docs test
.DEFAULT: docs

docs:
	mkdir -p docs/html
	vendor/bin/apigen generate --php --tree --source test --source src --destination docs/html

test:
	vendor/bin/phpunit
