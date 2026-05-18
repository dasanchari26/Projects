%Structure of ARCNN used

function [layers] = ARCNN_model()
layers = [
    imageInputLayer([50 50 1],"Name","imageinput")
    convolution2dLayer([9 9],64,"Name","conv1","BiasLearnRateFactor",0.1, "Padding","same")
    reluLayer("Name","lrelu1")
    %reluLayer("Name","relu_1")
    convolution2dLayer([7 7],32,"Name","conv2","BiasLearnRateFactor",0.1, "Padding","same")
    reluLayer("Name","lrelu2")
    %reluLayer("Name","relu_2")
    convolution2dLayer([3 3],16,"Name","conv_3","BiasLearnRateFactor",0.1,"Padding","same")
    reluLayer("Name","lrelu3")
    %reluLayer("Name","relu_3")
    %convolution2dLayer([5 5],8,"Name","conv0","BiasLearnRateFactor",0.1, "Padding","same")
    %leakyReluLayer("Name","lrelu0")
    %reluLayer("Name","relu_3")
    convolution2dLayer([5 5],1,"Name","conv_4","BiasLearnRateFactor",0.1,"Padding","same","WeightLearnRateFactor",0.1)
    regressionLayer("Name","regressionoutput")
    ];
%plot(layerGraph(layers));