.PHONY: build dev_bash help deploy

.DEFAULT_GOAL := help

###############################################################################
# Variables
###############################################################################
DOCKER_COMPOSE := docker-compose -f docker-compose.yml

###############################################################################
# Dev tasks
###############################################################################
build:  ## Build docker images
	${DOCKER_COMPOSE} build

up: build   ## Start docker images (DB / MySQL and no Java)
	${DOCKER_COMPOSE} up

logs:  ## Output logs of all containers
	${DOCKER_COMPOSE} logs --follow --timestamps

clear_docker_images:  ## Clear all docker volumes (effectively clears the database)
	${DOCKER_COMPOSE} down --volumes

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
