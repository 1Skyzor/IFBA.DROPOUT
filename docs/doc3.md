---
id: doc3
title: Modelo de Aprendizado de Máquina
sidebar_label: Modelo
---
O modelo foi gerado a partir do [<strong><font color = "blue">Keras</font></strong>](https://keras.io/) disponível na linguagem de programação [<strong><font color = "blue">Python</font></strong>](https://www.python.org/) e convertido para TensorFlowJs através do [<strong><font color = "blue">tensorflowjs_converter</font></strong>](https://www.tensorflow.org/js/guide/conversion) 

```
1 {
2     "format": "layers-model",
3     "generatedBy": "keras v2.5.0",
4     "convertedBy": "TensorFlow.js Converter v3.7.0",
5     "modelTopology": {
6         "keras_version": "2.5.0",
7         "backend": "tensorflow",
8         "model_config": {
9             "class_name": "Sequential",
10             "config": {
11                 "name": "sequential_19",
12                 "layers": [
13                     { "class_name": "InputLayer", "config": { "batch_input_shape": [null, 13], "dtype": "float32", "sparse": false, "ragged": false, "name": "dense_41_input" } },
14                     {
15                         "class_name": "Dense",
16                         "config": {
17                             "name": "dense_41",
18                             "trainable": true,
19                             "batch_input_shape": [null, 13],
20                             "dtype": "float32",
21                             "units": 7,
22                             "activation": "tanh",
23                             "use_bias": true,
24                             "kernel_initializer": { "class_name": "GlorotUniform", "config": { "seed": null } },
25                             "bias_initializer": { "class_name": "Zeros", "config": {} },
26                             "kernel_regularizer": null,
27                             "bias_regularizer": null,
28                             "activity_regularizer": null,
29                             "kernel_constraint": null,
30                             "bias_constraint": null
31                         }
32                     },
33                     {
34                         "class_name": "Dense",
35                         "config": {
36                             "name": "dense_42",
37                             "trainable": true,
38                             "dtype": "float32",
39                             "units": 7,
40                             "activation": "tanh",
41                             "use_bias": true,
42                             "kernel_initializer": { "class_name": "GlorotUniform", "config": { "seed": null } },
43                             "bias_initializer": { "class_name": "Zeros", "config": {} },
44                             "kernel_regularizer": null,
45                             "bias_regularizer": null,
45                             "activity_regularizer": null,
47                             "kernel_constraint": null,
48                             "bias_constraint": null
49                         }
50                     },
51                     {
52                         "class_name": "Dense",
53                         "config": {
55                             "name": "dense_43",
56                             "trainable": true,
57                             "dtype": "float32",
58                             "units": 1,
59                             "activation": "sigmoid",
60                             "use_bias": true,
61                             "kernel_initializer": { "class_name": "GlorotUniform", "config": { "seed": null } },
62                             "bias_initializer": { "class_name": "Zeros", "config": {} },
63                             "kernel_regularizer": null,
64                             "bias_regularizer": null,
65                             "activity_regularizer": null,
66                             "kernel_constraint": null,
67                             "bias_constraint": null
68                         }
69                     }
70                 ]
71             }
72         },
73         "training_config": {
74             "loss": "binary_crossentropy",
75             "metrics": [[{ "class_name": "MeanMetricWrapper", "config": { "name": "accuracy", "dtype": "float32", "fn": "binary_accuracy" } }]],
76             "weighted_metrics": null,
77             "loss_weights": null,
78             "optimizer_config": { "class_name": "RMSprop", "config": { "name": "RMSprop", "learning_rate": 0.0010000000474974513, "decay": 0.0, "rho": 0.8999999761581421, "momentum": 0.0, "epsilon": 1e-7, "centered": false } }
79         }
80     },
81     "weightsManifest": [
82         {
83             "paths": ["group1-shard1of1.bin"],
84             "weights": [
85                 { "name": "dense_41/kernel", "shape": [13, 17], "dtype": "float32" },
86                 { "name": "dense_41/bias", "shape": [17], "dtype": "float32" },
87                 { "name": "dense_42/kernel", "shape": [17, 17], "dtype": "float32" },
88                 { "name": "dense_42/bias", "shape": [17], "dtype": "float32" },
89                 { "name": "dense_43/kernel", "shape": [17, 1], "dtype": "float32" },
90                 { "name": "dense_43/bias", "shape": [1], "dtype": "float32" }
91             ]
92         }
93     ]
94 }
```
O modelo foi treinado utilizando os  [<strong><font color = "blue">dados históricos</font></strong>](https://data.mendeley.com/datasets/pn8k5xp37c/1/files/c799b531-6560-40ae-aa23-45f4db31832e) referente aos alunos. Por se tratar de um problema de classificação binária, definiu-se um total de <strong>duas</strong> camadas ocultas (linhas 12 à 50) com 7 neurônios cada (linhas 21 e 39), utilizando nelas a função de ativação <strong>tangente hiperbólica</strong> (linhas 22 e 40) e a função de ativação <strong>sigmoid</strong> na camada de <strong>saída</strong> (linha 59). A função de perda utilizada foi a binary_crossentropy (linha 74), utilizando o otimizador <strong>rmsprop</strong> e a métrica de performance utilizada foi a <strong>acurácia</strong>.

obs: A quantidade de neurônios das camadas ocultas foram definidos através da soma da quantidade de variáveis entradas (13) + o numero de neurônios da camada de saída (1), divididos por (2), que é a quantidade de classes, totalizando <strong>7</strong>.