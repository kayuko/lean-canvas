# Lean Canvas Generator

Small tool to generate lean canvas model from versionable text files

## Install

- clone repo
- run `composer install`


## Usage

Outside the directory, create a new directory to store the source files of your lean canvas.

For example:

```
lean-canvas/
my-awesome-project_leancanvas/
```

In `my-awesome-project_leancanvas/` directory you need to create one text file per cell of the Lean Canvas Model:

- customers.txt
- problem.txt
- uvp.txt
- solution.txt
- channels.txt
- revenues.txt
- costs.txt
- metrics.txt
- advantage.txt

Within `lean-canvas` run the `generate` command :

```bash
php generate ../my-awesome-project_leancanvas/
```

You will get a `canvas-{timestamp}.odt` file next to your source files.
