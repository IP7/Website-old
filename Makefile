# IP7's Website repository Makefile
# v.0.1
#
# provide shortcuts for useful commands

MODELS_DIR=./models
PROPEL_BUILD_DIR=${MODELS_DIR}/build
PROPEL_DOC_DIR=${PROPEL_BUILD_DIR}/docs

NOOP=@#

all: cache propel-gen propel-doc

# Propel generated ORM classes' documentation

doc: propel-doc
	${NOOP}

propel-doc: ${PROPEL_DOC_DIR}
	${NOOP}

# Generate ORM classes with Propel

propel-gen: ${PROPEL_BUILD_DIR}
	${NOOP}

clean:
	find . -name "*~" -delete

cache: ./cache/templates
	mkdir -p $<
	chmod -R 777 $<
	touch $<

# phpunit tests

unit-tests:
	cd tests;for f in *_unit_tests.php; do echo "Running $$f tests…";phpunit $$f;done


${PROPEL_DOC_DIR}: 
	@echo "Génération de la documentation pour Propel..."
	@echo "Ceci peut prendre entre 5 et 10 minutes en fonction de la puissance"
	@echo "de la machine."
	# lots of 'WARNING', but doesn't matter
	phpdoc -d ${PROPEL_BUILD_DIR}/classes -t $@
	touch $@

${PROPEL_BUILD_DIR}: ${MODELS_DIR}/schema.xml ${MODELS_DIR}/runtime-conf.xml ${MODELS_DIR}/build.properties
	cd ${MODELS_DIR};propel-gen
	touch $@

${MODELS_DIR}/build.properties: ${MODELS_DIR}
	touch $@

