# IP7's Website Makefile
# v0.1.0
#

PROPEL_GEN=vendor/propel/propel1/generator/bin/propel-gen

.PHONY: all models update-source vendor-update minify

all: update-source models vendor minify

update-source:
	git pull

models: propel
	cd models; \
		../${PROPEL_GEN}

migrate: propel
	cd models; \
		../${PROPEL_GEN} diff; \
		./migrate.sh; \
		../${PROPEL_GEN}

propel: vendor
twig: vendor

vendor:
	composer install --dev

vendor-update: composer.json
	composer update

minify: scripts/css-bundles.json js-bundles.json
	node ./scripts/minify.js
