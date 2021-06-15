var GaussianNB = function(priors, sigmas, thetas) {

    this.priors = priors;
    this.sigmas = sigmas;
    this.thetas = thetas;

    this.predict = function(features) {
        var likelihoods = new Array(this.sigmas.length);
    
        for (var i = 0, il = this.sigmas.length; i < il; i++) {
            var sum = 0.;
            for (var j = 0, jl = this.sigmas[0].length; j < jl; j++) {
                sum += Math.log(2. * Math.PI * this.sigmas[i][j]);
            }
            var nij = -0.5 * sum;
            sum = 0.;
            for (var j = 0, jl = this.sigmas[0].length; j < jl; j++) {
                sum += Math.pow(features[j] - this.thetas[i][j], 2.) / this.sigmas[i][j];
            }
            nij -= 0.5 * sum;
            likelihoods[i] = Math.log(this.priors[i]) + nij;
        }
    
        var classIdx = 0;
        for (var i = 0, l = likelihoods.length; i < l; i++) {
            classIdx = likelihoods[i] > likelihoods[classIdx] ? i : classIdx;
        }
        return classIdx;
    };

};

if (typeof process !== 'undefined' && typeof process.argv !== 'undefined') {
    if (process.argv.length - 2 === 13) {

        // Features:
        var features = process.argv.slice(2);

        // Parameters:
        var priors = [0.551219512195122, 0.44878048780487806];
        var sigmas = [[0.2337082470484744, 1.0588339900692818, 1.7225250129762386, 0.991948677287861, 0.9133982998129311, 0.9959850313716639, 1.1355867038801672, 1.356079888339768, 0.4097345693514042, 0.965763483792628, 0.9663633883628902, 0.8810384715158952, 0.9174998449418996], [1.9439438286224895, 0.7792823162365028, 0.22980164708379794, 1.0701787310313364, 0.9493924270743498, 0.8863605594812959, 1.34358931355012, 0.41593416230742736, 0.6933220655883594, 0.9761220050879243, 1.0365551820907106, 0.791349919532486, 0.8786374791503437]];
        var thetas = [[-0.10906103076098134, 0.10092943324312813, -0.13374337287678295, 0.04423205257990569, -0.044209341636973085, 0.03734930157283668, -0.00196731198294991, -0.080987407830881, -0.05339576685592216, 0.08743475513371031, 0.11495787704506864, 0.22873772706160878, 0.15411642848779564], [0.1448638163868068, -0.17783170794365938, 0.12934134894940333, 0.053318820319791974, 0.14677292080918755, -0.07058806651744692, -0.022265145011999585, 0.21096706232829734, -0.04441601084089848, -0.15270838818327168, -0.06156048794071342, -0.18904660260644224, -0.22054868619697365]];

        // Estimator:
        var clf = new GaussianNB(priors, sigmas, thetas);
        var prediction = clf.predict(features);
        console.log(prediction);

    }
}