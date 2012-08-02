# IP7's Website repository Makefile
# v.0.1
#
# provide shortcuts for useful commands

PROPEL_BUILD_DIR= ./models/build
PROPEL_DOC_DIR=${PROPEL_BUILD_DIR}/build/doc

NOOP=@#

doc: propel-doc
	${NOOP}

propel-doc: ${PROPEL_DOC_DIR}
	${NOOP}

clean:
	find . -name "*~" -delete


# lots of 'WARNING', but doesn't matter
${PROPEL_DOC_DIR}: 
	@echo "Génération de la documentation pour Propel..."
	@echo "Ceci peut prendre entre 5 et 10 minutes en fonction de la puissance"
	@echo "de la machine."
	phpdoc -d ${PROPEL_BUILD_DIR}/classes -t ${PROPEL_DOC_DIR}

